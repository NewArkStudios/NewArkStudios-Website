<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     * When using this middle-ware user must be an admin otherwise redirect
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // null check
        if (Auth::user()) {

            // check if user is logged in 
            if (!(Auth::user()->hasRole("admin"))) {
                return redirect('information')->with('information', "You must be logged into as an administrator to access.");
            }
        } else {
            return redirect()->route('register');
        }
        return $next($request);
    }
}
