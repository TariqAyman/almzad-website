<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use anlutro\LaravelSettings\Facade as Setting;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    protected $maxAttempts;
    protected $decayMinutes;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth:admin', ['only' => ['getLogout']]);
        $this->maxAttempts = Setting::get('max_login_attempts', 3);
        $this->decayMinutes = Setting::get('lockout_delay', 2);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showLoginForm()
    {
        $pageConfigs = ['blankPage' => true];

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard.auth.login', compact('pageConfigs'));
    }

    public function login(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
            return redirect()->route('admin.login')->withInput()->withwarning('You are locked! Too many attempts. please try ' . setting('lockout_delay') . ' minutes later.');
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $request->remember)) {
            $userStatus = Auth::guard('admin')->user()->status;

            if ($userStatus == 1) {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->withInput()->withwarning('You are temporary blocked. please contact to admin');
            }
        } else {
            $this->incrementLoginAttempts($request);
            return redirect()->route('admin.login')->withInput()->withErrors(trans('passwords.Incorrect Mobile or password. Please try again'));
        }

    }

    /**
     * Log the user out of the application.
     *
     * @return RedirectResponse
     */
    public function getLogout()
    {
        \Auth::logout();
        \Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    /**
     * Log the user out of the application.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }


}
