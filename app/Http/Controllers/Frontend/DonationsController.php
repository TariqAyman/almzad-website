<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Wallet;
use Illuminate\Http\Request;

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

        Donation::query()->create([
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
