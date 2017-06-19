<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
    * Display the UI page to actually send a direct message
    */
    public function display_make_message($receiver_name) {

        $data = [
            'receiver_name' => $receiver_name
        ];

        return view('pages.message_make', $data);
    }

    /**
    * Create the instance for direct message, 
    * add to database message
    */
    public function make_message(Request $request) {

        $receiver = User::where('name', $request['receiver_name'])->first();
        $sender = Auth::user();

        $message = new Message();
        $message->message = $request['message'];
        $message->sender_id = $sender->id;
        $message->receiver_id = $receiver->id;
        $message->read = false;

        $message->save();
        return redirect('/inbox');
    }
}
