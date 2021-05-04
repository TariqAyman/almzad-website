<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth:user', ['only' => ['getLogout']]);
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
        if (Auth::guard('user')->check()) {
            return redirect()->route('frontend.profile.index');
        }

        return view('frontend.user.login');
    }

    public function login(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
            return redirect()->route('login')->withInput()->withwarning('You are locked! Too many attempts. please try ' . setting('lockout_delay') . ' minutes later.');
        }

        $credentials = $request->only('phone_number', 'password');

        $user = User::where('phone_number',$request->phone_number)->first();

        if ($user && Auth::guard('user')->attempt(['email' => $user->email, 'password' => $credentials['password']], $request->remember)) {
            $userStatus = Auth::guard('user')->user()->status;

//            if ($userStatus == 1) {
                return redirect()->intended(route('frontend.profile.index'));
//            } else {
//                Auth::guard('user')->logout();
//                return redirect()->route('login')->withInput()->withwarning('You are temporary blocked. please contact to admin');
//            }
        } else {
            $this->incrementLoginAttempts($request);
            return redirect()->route('login')->withInput()->withErrors('Incorrect username or password. Please try again');
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
        \Auth::guard('user')->logout();
        return redirect()->route('login');
    }

    /**
     * Log the user out of the application.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        \Auth::guard('user')->logout();
        return redirect()->route('login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

}
