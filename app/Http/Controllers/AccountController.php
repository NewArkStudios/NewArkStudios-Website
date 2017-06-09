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

    public function display_edit_profile() {
        $user = Auth::user();
        return view('pages.profile_edit', $user);
    }

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
