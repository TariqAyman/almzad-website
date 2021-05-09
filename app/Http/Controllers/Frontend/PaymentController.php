<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\AlrajhiPaymentEncryption;
use App\Helpers\AlrajhiPaymentGateway;
use App\Http\Controllers\Controller;
use App\Models\AlrajhiPayment;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    const CAPTURED_STATUS = 'CAPTURED';// Captured result will be considered as transaction success
    const NOT_CAPTURED_STATUS = 'NOT CAPTURED';// This will be considered as transaction failure
    const APPROVED_STATUS = 'APPROVED';// This will be considered as transaction success for Pre-Authorization.
    const NOT_APPROVED_STATUS = 'NOT APPROVED';// This will be considered as transaction failure for Pre-Authorization.
    const VOIDED_STATUS = 'VOIDED';// Success for Void transaction
    const DENIED_BY_RISK_STATUS = 'DENIED BY RISK';// If the Risk validation failed, then PG will decline the transaction with this result
    const HOST_TIMEOUT_STATUS = 'HOST TIMEOUT'; // If there is no response from respective interchange during authorization, then PG will provide the Host timeout result.

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $alrajhiPayment = AlrajhiPayment::create([
            'amount' => number_format($request->amount, 2),
            'user_id' => auth('user')->user()->id,
            'email' => $request->email
        ]);

        return $this->init($alrajhiPayment->amount, $alrajhiPayment->id);
    }

    public function init($amount, $paymentTransactionId)
    {
        $alrajhiPayment = AlrajhiPayment::find($paymentTransactionId);

        $amount = number_format($amount, 2);

        $random = rand(1, 123456789);

        $data[] = [
            //Mandatory Parameters
            "amt" => "$amount",
            "action" => "1", // 1 - Purchase , 4 - Pre-Authorization
            "password" => env('ALRAJHI_TRANPORTAL_PASSWORD'),
            "id" => env('ALRAJHI_TRANPORTAL_ID'),
            "currencyCode" => "682",
            "trackId" => (env('APP_ENV') == 'dev') ? "{$paymentTransactionId}{$random}" : "{$paymentTransactionId}",
            "responseURL" => route('frontend.payment.responseURL'),
            "errorURL" => route('frontend.payment.errorURL'),
        ];

        $TranDataJsonEncode = json_encode($data);

        $AlrajhiPaymentEncryption = \App::make(AlrajhiPaymentEncryption::class);

        $TranDataEncryption = $AlrajhiPaymentEncryption->encryptAES($TranDataJsonEncode, env('ALRAJHI_TERMINAL_RESOURCE_KEY'));

        $paymentInfo['data'] = $data;
        $paymentInfo['data_encrypted'] = $TranDataEncryption;

        $http_build_query[] = [
            'id' => env('ALRAJHI_TRANPORTAL_ID'),
            "responseURL" => route('frontend.payment.responseURL'),
            "errorURL" => route('frontend.payment.errorURL'),
            "trandata" => $TranDataEncryption,
        ];

        $http_build_query = json_encode($http_build_query);

        $paymentInfo['request_data'] = $http_build_query;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('ALRAJHI_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $http_build_query,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);

        $result = json_decode($response);

        if (isset($result[0]) && $result[0]->status == 1) {
            $string_position = strpos($result[0]->result, "http");
            $url = substr($result[0]->result, $string_position);
            $payment_id = substr($result[0]->result, 0, $string_position - 1);
            $url = $url . '?PaymentID=' . $payment_id;

            $paymentInfo['response_init'] = $result;
            $paymentInfo['payment_id'] = $payment_id;
            $paymentInfo['payment_iframe_url'] = $url;

            $alrajhiPayment->update($paymentInfo);

            return redirect()->route('frontend.wallet.index')->with(['url' => $url]);

        } else {
            $paymentInfo['response_init'] = $result;

            $alrajhiPayment->update($paymentInfo);

            return redirect()->back()->withErrors(trans('app.Something went wrong please try again'));
        }
    }

    public function successCallback(Request $request)
    {
        $alrajhiPaymentEncryption = \App::make(AlrajhiPaymentEncryption::class);

        $data = $request->all();

        $tranDataEncryption = $alrajhiPaymentEncryption->decryptData($data['trandata'], env('ALRAJHI_TERMINAL_RESOURCE_KEY'));

        $dataArr = json_decode($tranDataEncryption, true);

        $sessionId = $dataArr[0]["udf2"] ?? null;
        $paymentStatus = $dataArr[0]["result"] ?? null;
        $orderId = $dataArr[0]["udf1"] ?? null;

        $response = $dataArr[0];

        $message = trans('app.error_payment');
        $messageType = 'errors';

        $alrajhiPayment = AlrajhiPayment::query()->where('payment_id', $response['paymentId'])->first();


        if (isset($paymentStatus) && $paymentStatus === self::CAPTURED_STATUS) {

            $name = $alrajhiPayment->user->name;

            $amount = $response['amt'];
            Transaction::query()->create([
                'user_id' => $alrajhiPayment->user->id,
                'amount' => $response['amt'],
                'note' => "تحصيل قيمة {$amount} من المسنخدم {$name}",
                'payment_id' => $alrajhiPayment->id
            ]);

            Wallet::query()->create([
                'type' => 'balance',
                'user_id' => $alrajhiPayment->user->id,
                'in' => $response['amt'],
                'out' => 0,
                'hold' => 0,
                'balance' => floatval($amount) + $alrajhiPayment->user->available_balance,
                'note' => "تم اضافة رصيد {$amount} الي حسابك عن طريق الدفع الالكتروني",
            ]);

            $messageType = 'success';
            $message = trans('app.success_payment');
        }

        $alrajhiPayment->update([
            'response_callback_encrypted' => $data['trandata'],
            'response_callback' => $response,
            'status' => $paymentStatus,
        ]);

        return redirect()->route('frontend.wallet.index')->with($messageType, $message);
    }


    public function errorCallback(Request $request)
    {
        dd($request->all());
    }

    // 5105105105105100
    // 12/31 999
}
