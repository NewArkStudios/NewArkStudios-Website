<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // get all notifications currently attached to the user
    public function getAllNotifications(){
        
        // check if we are logged in
        $user = Auth::user();
        if (!$user)
            return response()->json([]);

        // grab notifications
        return response()->json($user->notifications);
    }
}
