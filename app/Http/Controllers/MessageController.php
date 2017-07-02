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

        $user = User::where('name', $receiver_name)->first();

        return view('pages.message_make', compact('user'));
    }

    /**
    * Create the instance for direct message, 
    * add to database message
    */
    public function make_message(Request $request) {

        $receiver = User::where('name', $request['receiver_name'])->first();
        $sender = Auth::user();

        $message = new Message();
        $message->message = clean($request['message']);
        $message->subject = $request['subject'];
        $message->sender_id = $sender->id;
        $message->receiver_id = $receiver->id;
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

        $sent_messages = $sent_messages->merge($received_messages);
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

    /**
    * Make reply to direct message
    */
    public function reply_message(Request $request) {

        // make sure user is part of direct message
        $user = Auth::user();
        
        // grab the message based on the on the one sent
        $message_reply = new MessageReply();
        $message_reply->message_id = $request['message_id'];
        $message_reply->user_id = $user->id;
        $message_reply->body = clean($request['body']);

        $message_reply->save();

        return redirect()->back();
    }
}
