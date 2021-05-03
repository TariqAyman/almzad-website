<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\AlrajhiPayment;
use App\Helpers\AlrajhiPaymentEncryption;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PhoneVerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (!auth('user')->check()){
            return redirect()->route('login');
        }

        return view('frontend.user.phone_verify');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('phoneNumber')){
            $user = User::where('phone_number',$request->phoneNumber)->first();

            if ($user){

            }
        }
    }

    public function test()
    {
        return AlrajhiPayment::init(1,123);
    }
}
