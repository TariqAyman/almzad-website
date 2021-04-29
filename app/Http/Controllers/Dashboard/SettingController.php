<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use anlutro\LaravelSettings\Facade as Setting;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

class SettingController extends Controller
{
    use UploadFile;

    public function __construct()
    {
        $this->middleware('permission:update-settings');
        $this->middleware('permission:view-activity-log', ['only' => ['activity']]);
    }

    public function index()
    {
        activity('settings')->causedBy(Auth::user())->log('view');
        $roles = Role::pluck('name', 'id');
        return view('dashboard.settings.edit', compact('roles'));
    }

    public function update(Request $request)
    {

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {

                $company_logo = $this->uploadFile($request, $key, 'settings');

                Setting::set($key, parse_url($company_logo, PHP_URL_PATH));
            } else {
                Setting::set($key, $value);
            }
        }

        Setting::save();

        activity('settings')->causedBy(Auth::user())->withProperties($request->all())->log('updated');

        return back()->withsuccess('Settings updated successfully!');

    }
}
