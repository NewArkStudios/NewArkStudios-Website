<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use DateTime;

class AccountController extends Controller
{
    public function display_profile($profile_slug) {

        $user = User::where('name', $profile_slug)->first();

        $user_info = [
            "name" => $user->name,
            "bio" => ($user->bio) ? $user->bio : false,
            "age" => ($user->age) ? $user->bio :false,
            'birthday' => ($user->birthday) ? $user->birthday : false,
            "email" => $user->email
        ];

        return view('pages.profile_view', $user_info);

    }

    /**
    * Displays the page for editing the profile info
    */
    public function display_edit_profile() {
        $user = Auth::user();
        return view('pages.profile_edit', $user);
    }

    /**
    * Function for displaying the settings page
    */
    public function get_Settings(){
        
        $user = Auth::user();
        return view('pages.account_settings', $user);
    }

    /**
    * Update Account information such as settings
    */
    public function update_account_post(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users'
        ]);

        if ($validator->fails()) { 
            return redirect('/account/update_account_post')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $user->email = $request['email'];

        $user->save();
        return "success"; // please create screen for this
    }

    /**
    * Form post for updating the profile information
    * @param request object from laravel
    * @return view for successful update or redirect on fail
    */
    public function update_profile_post(Request $request) {

        $validator = Validator::make($request->all(), [
            'bio' => 'string|nullable',
            'birthday_day' => 'numeric',
            'birthday_month' => 'numeric',
            'birthday_year' => 'numeric',
        ]);

        if ($validator->fails()) { 
            return redirect('/account/profile')
                ->withErrors($validator)
                ->withInput();
        }

        // grab the current user
        $user = Auth::user();
        $birthday = new DateTime((string)$request['birthday_month'] . "/" . (string)$request['birthday_day'] . "/" . (string)$request['birthday_year']);
        $current = new DateTime("now");
        $interval = $birthday->diff($current);

        $user->bio = $request['bio'];
        $user->birthday = $birthday;
        $user->age = $interval->y;

        $user->save();
        return "success"; // please create screen for this
    }
}
