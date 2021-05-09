<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUs\ContactUStoreRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.contactus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactUStoreRequest $request)
    {
        $data = [
            'subject' => $request->subject,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'name' => $request->name,
        ];

        $data['phone'] = '+966' . $data['phone'];

        if (!preg_match('/^[+](966)(\d{9})$/',$data['phone'])) return redirect()->route('frontend.contact-us.index')->withInput()->withErrors(trans('passwords.invalid phone number'));

        if (auth('user')->check()){
            $data['user_id'] = auth('user')->user()->id;
        }

        ContactUs::query()->create($data);

        return redirect()->back()->withSuccess('تم ارسال رساله لادراة');
    }
}
