<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Logged_In
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = Auth::user();

        // check if user is logged in 
        if (is_null($user))
            return redirect()->route('register');
        elseif ($user->banned == 2) {
            Auth::logout();
            return response()->view('auth.banned', ['suspended_till' => false]);

        } elseif ($user->banned == 1) {
            $suspended_till = $user->suspended_till;
            Auth::logout();
            return response()->view('auth.banned', ['suspended_till' => $suspended_till]);
        }

        return $next($request);
    }
}
