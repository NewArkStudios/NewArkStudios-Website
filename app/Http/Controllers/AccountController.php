<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

use App\User;
use DateTime;

class AccountController extends Controller
{
    public function display_profile($profile_slug) {

        $user = User::where('name', $profile_slug)->first();

        // check if user exists
        if(is_null($user)) {
            $error = [
                "error" => 'User does not exist'
            ];
            return view('pages.profile_view', $error);
        }

        $user_info = [
            "id" => $user->id,
            "name" => $user->name,
            "moderator" => $user->hasRole('moderator'),
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
    * Update password for user
    */
    public function update_password(Request $request){

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);

        // validate, if call fails redirect back
        // we manually need to do this because we need to add the hash
        if ($validator->fails()) {
            return redirect(URL::previous() . "#passwordsection")
            ->withErrors($validator);
        }

        // get the user
        $user = Auth::user();
        $user->password = bcrypt($request['password']);
        $user->save();

        return redirect(URL::previous() . "#passwordsection")->with(["message" => "Password updated"]);
    }

    /**
    * Update Account information such as settings
    * FormRequests Requests/update_account_post form request, validation rule is there
    */
    public function update_account_post(Request $request) {
        
        $user = Auth::user();

        // Make validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|alpha_dash|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        // validate, if call fails redirect back
        $validator->validate();
 
        $user->email = $request['email'];
        $user->name = $request['name'];


        $user->save();
        return redirect()->back()->with(["message" => "Successfully updated account information"]);
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
