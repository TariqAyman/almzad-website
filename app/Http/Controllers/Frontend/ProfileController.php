<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use UploadFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::guard('user')->user();
        return view('frontend.user.profile', compact('user'));
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
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserUpdateRequest $request)
    {
        $user = \Auth::guard('user')->user();

        $userData = $request->except('profile_photo','oldPassword','newPassword');

        if ($request->profile_photo) {
            $userData['profile_photo'] = $this->uploadFile($request, 'profile_photo', 'users');
        }

        if ($request->has('newPassword') && \Hash::check($request->oldPassword,$user->password)){
            $userData['password'] = $request->newPassword;
        }

        if ($request->phone_number != $user->phone_number){
            $userData['phone_verified']  = false;
        }

        $user->update($userData);

        return redirect()->back()->withsuccess(trans('app.Profile updated successfully!'));
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
