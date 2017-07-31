<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Archive_Replies;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{

    /*
    * Make a forum reply and store in database, within iits own table
    */
    public function make_reply(Request $request){
        
        
        // Create new model object
        $reply = new Reply();

        // set table values and clean input to allow sanitized inject
        $reply->user_id = Auth::user()->id;
        $reply->post_id = $request['post_id'];
        $reply->body = clean($request['body']);

        // find the corresponding post id and change updated_at post to current time
        // with the touch method
        $post = Post::where('id', $request['post_id'])->first();

        // check whether post is closed, somehow someone makes post request anyways
        if ($post->closed)
            return "post is closed";

        $post->touch();

        // save values
        $reply->save();

        return redirect()->back();
    }

    /**
    * Display the page to edit the reply
    */
    public function display_edit_reply($reply_id) {

        // check if reply belongs to user
        $reply = Reply::where('id', $reply_id)->first();
        $user = Auth::user();

        // if doesn't belong
        if ($reply->user->id != $user->id)
            return "why are you trying to edit someone else's post";

        return view('pages.thread_edit_reply', compact('reply'));
    }

    /**
    * Edit the post
    */
    public function edit_reply(Request $request) {

        // check if post belongs to user
        $reply = Reply::where('id', $request['reply_id'])->first();
        $user = Auth::user();

        // if doesn't belong
        if ($reply->user->id != $user->id)
            return "why are you trying to edit someone else's post";
        
        // save old info
        $archive_reply = new Archive_Replies();
        $archive_reply->reply_id = $reply->id;
        $archive_reply->body = $reply->body;
        $archive_reply->save();

        $reply->body = $request['body'];
        $reply->edited = true;
        $reply->save();

        return redirect('post/' . $reply->post->slug);
    }


}
