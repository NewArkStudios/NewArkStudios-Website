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
            "id" => $user->id,
            "name" => $user->name,
            "bio" => ($user->bio) ? $user->bio : false,
            "age" => ($user->age) ? $user->bio :false,
            'birthday' => ($user->birthday) ? $user->birthday : false,
            "email" => $user->email,
            "posts" => $user->posts()->paginate(5),
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
    * FormRequests Requests/update_account_post form request, validation rule is there
    */
    public function update_account_post(Request $request) {
        
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
