<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class AccountController extends Controller
{
    public function display_profile($profile_slug) {

        $user = User::where('name', $profile_slug)->first();

        // note we shouldn't pass all information, because hashing and salt
        // can be reversed with serious effort. Pass what is only necessary in terms
        // of user information.

        $user_info = [
            "name" => $user->name,
            "bio" => ($user->bio) ? $user->bio : false,
            "age" => ($user->age) ? $user->bio :false,
            'birthday' => ($user->birthday) ? $user->birthday : false,
            "email" => $user->email
        ];

        return view('pages.profile_view', $user_info);

    }
}
