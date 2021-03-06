<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Message;
use App\Models\Post;
use App\Users;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;

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
    * Function to fully ban the user
    * set their ban value at 2
    */
    public function suspend_user(Request $request) {

        // grab the user from the report
        $report = Report::where('id', $request['report_id'])->first();
        $suspect = $report->suspect;
        $suspect->banned = 1;
        $suspect->suspended_till = Carbon::createFromDate(2018, 6, 26)->addWeeks(2);
        $suspect->save();

        // grab the post and update its view        
        if (!is_null($report->post_id)) {
            $post = $report->post;
            $post->warned = 1;
            $post->save();
        } elseif (!is_null($report->reply_id)) {
            $reply = $report->reply;
            $reply->warned = 1;
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

    /**
    * Delete report as useless or unfounded, suspect was found innocent
    */
    public function delete_report(Request $request) {

        // grab the user from the report
        $report = Report::where('id', $request['report_id'])->first();

        // delete the report as it will be of no use
        $report->delete();

        return redirect()->back();        
  
    }

    /**
    * Close a post so people can no longer post to it
    * @param Request query, contains all info passed for request
    */
    public function close_post(Request $request) {

      $post_id = $request['post_id'];
      $post = Post::where('id', $post_id)->first();
      $post->closed = true;
      $post->save();
    }

    /**
    * Open a post so people can commit to it again
    * @param Request query, contains all info passed for request
    */
    public function open_post(Request $request) {

      $post_id = $request['post_id'];
      $post = Post::where('id', $post_id)->first();
      $post->closed = false;
      $post->save();
    }

    /**
    * Delete a post so people can no longer post to or see it
    * At the moment deleting posts should only be available to admins
    * @param Request query, contains all info passed for request
    */
    public function delete_post(Request $request) {

      $post_id = $request['post_id'];
      $post = Post::where('id', $post_id)->first();
      $post->delete();

      return redirect()->back();
    }

    /**
    * Pin post so that it appears on top of category
    * @param Rquest query contains all the info passed
    */
    public function pin_post(Request $request) {

        $post_id = $request['post_id'];
        $post = Post::where('id', $post_id)->first();
        $post->pinned = 1;
        $post->save();

        return redirect()->back();
    }
}
