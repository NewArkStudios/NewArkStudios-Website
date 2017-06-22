<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\MessageReply;
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

    /**
    * Display message, while making sure this is the correct user.
    */
    public function display_message($message_id) {

        // PETER TODO IN FUTURE, if there is time HASH out, or change to post for direct messages

        // make sure that this is correct user
        $user = Auth::user();
        $user_id = $user->id;

        // get message that is requested by url
        $message = Message::where('id', $message_id)->first();

        // make sure user is actually the one allowed to view this
        if (!($message->sender_id == $user_id) && !($message->receiver_id == $user_id)) {
            return "why you trying to look at other people's messages...";
        } else {

            // Get message replies corresponding with this message
            $message_replies = MessageReply::where('message_id', $message->id)->get();
            $data = [
                "message" => $message,
                "replies" => $message_replies
            ];
            return view('pages.message_display', $data);
        }

    }
}