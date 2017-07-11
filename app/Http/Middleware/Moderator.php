<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Moderator
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
        
        // null check for logged in
        if (Auth::user()) {

            // check if user is moderator in 
            if (!(Auth::user()->hasRole("moderator")))
                return redirect()->route('register');
        } else {
            return redirect()->route('register');
        }

        return $next($request);
    }
}
