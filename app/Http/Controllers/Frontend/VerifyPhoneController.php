<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifyPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (!auth('user')->check()) {
            return redirect()->route('login');
        }

        return view('frontend.user.verifyPhone');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request->all());


        if ($request->has('phoneNumber')) {
            $user = User::where('phone_number', $request->phoneNumber)->first();

            if ($user) {

            }
        }
    }

    public function sendOTP(Request $request)
    {
        if (!$request->has('recaptchaToken')) return;

        $curl = curl_init();

        $data['phoneNumber'] = auth('user')->user()->phone_number;
        $data['recaptchaToken'] = $request->recaptchaToken;

        $data = json_encode($data);

        $api_key = env('FIREBASE_API_KEY');

        auth('user')->user()->update([
            'recaptchaToken' => $request->recaptchaToken,
            'recaptchaTokenTime' => Carbon::now()
        ]);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.googleapis.com/identitytoolkit/v3/relyingparty/sendVerificationCode?key={$api_key}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);

        dd($response);
        dd($response->sessionInfo);

        auth('user')->user()->update([
            'sessionInfo' => $response->sessionInfo
        ]);

    }

    public function verifyPhoneNumber(Request $request)
    {
        $data['sessionInfo'] = auth('user')->user()->sessionInfo;
        $data['code'] = $request->code;

        $data = json_encode($data);

        $api_key = env('FIREBASE_API_KEY');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyPhoneNumber?key={$api_key}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        echo $response;
    }
}
