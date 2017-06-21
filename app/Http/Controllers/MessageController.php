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
        $message->subject = $request['subject'];
        $message->sender_id = $sender->id;
        $message->sender_name = $sender->name;
        $message->receiver_id = $receiver->id;
        $message->receiver_name = $receiver->name;
        $message->read = false;

        $message->save();
        return redirect('messages/inbox');
    }

    /**
    *Get the list of all messages the user participated in
    */
    public function inbox (Request $request) {
        $user = Auth::user();
        $sent_messages = Message::where('sender_id', $user->id)->get();
        $received_messages = Message::where('receiver_id', $user->id)->get();

        $sent_messages->merge($received_messages);
        $sent_messages->sortBy('updated_at');

        return view('pages.message_inbox', compact('sent_messages'));
    }
}
