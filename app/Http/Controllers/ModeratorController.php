<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Message;
use App\Users;
use Illuminate\Support\Facades\Auth;

class ModeratorController extends Controller
{
    // display the moderator panel
    public function display_moderator_panel() {

        // Get the list of all reports, this grabs all and 
        // only displays number
        $reports = Report::paginate(5);

        return view('pages.moderator_panel', compact('reports'));
    }

    /**
    * Function to fully ban the user
    * set their ban value at 2
    */
    public function ban_user(Request $request) {

        // grab the user from the report
        $report = Report::where('id', $request['report_id'])->first();
        $suspect = $report->suspect;
        $suspect->banned = 2;
        $suspect->save();

        // grab the post and update its view        
        if (!is_null($report->post_id)) {
            $post = $report->post;
            $post->warned = 2;
            $post->save();
        } elseif (!is_null($report->reply_id)) {
            $reply = $report->reply;
            $reply->warned = 2;
            $reply->save();
        }

        // delete the report as it will be of no use
        $report->delete();

        return redirect()->back();        
    }
    
    /**
    * Warn the user, send a direct message, provide a notification
    */
    public function warn_user(Request $request) {

        // grab the user from the report
        $report = Report::where('id', $request['report_id'])->first();
        $suspect = $report->suspect;

        // setup direct message with user
        $message = new Message;
        $message->subject = "Warned for toxic behaviour";
        $message->message = "You have been warned for toxic behaviour corresponding" + 
        "to this post."; 
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $suspect->id;
        $message->save();

        // grab the post and update its view        
        if (!is_null($report->post_id)) {
            $post = $report->post;
            $post->warned = 3;
            $post->save();
        } elseif (!is_null($report->reply_id)) {
            $reply = $report->reply;
            $reply->warned = 3;
            $reply->save();
        }

        // delete the report as it will be of no use
        $report->delete();

        return redirect()->back();        
  
    }
}
