<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

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
}
