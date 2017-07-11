<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use \Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    }

    /**
     * OVERRIDE function 
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            $user = User::where('email', $request['email'])->first();

            // since the credentials are correct check if user can login
            // user should exist
            // TODO in the future if we need more than this, more validation
            // we may need to update the session Guard to better code this
            if ($this->check_banned($user)) {
                
                // log user out, and show banned screen
                $this->guard()->logout();
                $request->session()->flush();
                $request->session()->regenerate();

                $view_data = [
                    "suspended_till" => false,
                ];

                return view('auth.banned', $view_data);
            } elseif ($this->check_suspended($user)) {

                // log user out, and show banned screen
                $this->guard()->logout();
                $request->session()->flush();
                $request->session()->regenerate();

                // user is suspended and show that 
                $view_data = [
                    "suspended_till" => $user->suspended_till,
                ];

                return view('auth.banned', $view_data);
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
    * Check whether the user is banned
    */
    protected function check_banned(User $user) {
        return $user->is_banned();
    }

    /**
    * Check whether the user is suspended
    */
    protected function check_suspended(User $user) {

        // check user is suspended
        if ($user->is_suspended()) {
            
            
            // we now know user is suspended check whether the
            // user's time has ended
            $suspension = new Carbon($user->suspended_till);
            $current = Carbon::now();

            // check if the time for suspension has passed
            if ($current->gte($suspension)) {
                
                // unban user and remove suspension date
                $user->banned = 0;
                $user->suspended_till = null;

                $user->save();

                return false;
            } else
                return true;



        } else 
            return false;

    }
}

