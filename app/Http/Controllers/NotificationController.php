<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    /**
     * Create a new controller instance.
     * Make sure anyone who uses these routes are indeed
     * logged in
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // get all notifications currently attached to the user
    public function getAllNotifications(){
        
        // check if we are logged in
        $user = Auth::user();
        if (!$user)
            return response()->json([]);

        // grab notifications
        return response()->json($user->notifications);
    }

    /**
    * Clear all notifications for the user
    */
    public function clearAllNotifications(){

        // check if we are logged in
        $user = Auth::user();
        if (!$user)
            return response()->json([]);

        // delete all notifications
        $user->notifications()->delete();

        return response()->json(['success'=>true]);
    }
}
