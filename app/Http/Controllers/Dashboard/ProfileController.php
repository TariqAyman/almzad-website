<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use UploadFile;

    public function profile()
    {
        $admin = \Auth::user();
        return view('dashboard.admins.profile', compact('admin'));
    }

    public function profileUpdate(AdminUpdateRequest $request)
    {
        $admin = \Auth::user();

        $userData = $request->except('profile_photo');

        if ($request->profile_photo) {
            $userData['profile_photo'] = $this->uploadFile($request, 'profile_photo', 'admins');
        }

        $admin->update($userData);
        flash('Profile updated successfully!')->success();
        return back();
    }
}
