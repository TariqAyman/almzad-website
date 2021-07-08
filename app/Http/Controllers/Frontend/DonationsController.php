<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Wallet;
use App\Notifications\DonationNotification;
use App\Notifications\RefundRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Notification;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'note' => 'required',
            'amount' => 'required|min:1|max:' . auth('user')->user()->available_balance,
        ]);

        if ($request->amount > auth('user')->user()->available_balance){
            return redirect()->back()->withError(trans('app.you_not_have_balance_to_donation'));
        }

        $donation = Donation::query()->create([
            'user_id' => auth('user')->user()->id,
            'note' => $request->note,
            'amount' => $request->amount,
        ]);

        Wallet::query()->create([
            'type' => 'donation',
            'user_id' => auth('user')->user()->id,
            'in' => 0,
            'out' => $request->amount,
            'hold' => 0,
            'balance' => auth('user')->user()->available_balance - $request->amount,
            'note' => trans('app.An :amount has been donated to the charity', ['amount' => $request->amount])
        ]);

        Notification::locale(App::getLocale())->send($donation->user, new DonationNotification($donation));

        return redirect()->back()->withSuccess(trans('app.success_send_donation'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
