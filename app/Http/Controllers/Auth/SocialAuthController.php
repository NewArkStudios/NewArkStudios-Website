<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   


    public function callback(SocialAccountService $service)
    {
        $social_obj = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($social_obj["user"]);

        // check if user is new, if so ask them to update information
        if ($social_obj["new"])
            echo "New user";

        // funny little note about facebook api
        // https://stackoverflow.com/questions/7131909/facebook-callback-appends-to-return-url
        return redirect('/account/settings/');
    }
    
}
