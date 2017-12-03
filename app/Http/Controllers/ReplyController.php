<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Reply_Like;
use App\Models\Reply_Dislike;
use App\Notifications\Forum;
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

        // grab all the users associated with the forum
        $postUser = $post->user;
        $postreplies = $post->replies;

        // don't notify user who made the reply they know
        // they made the reply
        $unique_users = [Auth::user()->id];

        // notify original poster if thery are not replier
        if (Auth::user()->id != $postUser->id) {
            $postUser->notify(new Forum($post, $reply));
            array_push($unique_users, $postUser->id);
        }

        foreach($postreplies as $postreply) {
            if(!(in_array($postreply->user_id, $unique_users))) {
                $postreply->user->notify(new Forum($post, $reply));
                array_push($unique_users, $postreply->user_id);
            }
        }
        

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

    /**
    * Like a reply
    */
    public function dislike_reply(Request $request) {

        $reply = Reply::where('id', $request['reply_id'])->first();
        $disliked = $this->determine_if_user_disliked_reply($reply);

        if (!$disliked) {
            $dislike = new Reply_Dislike();
            $dislike->user_id = Auth::user()->id;
            $dislike->reply_id = $request['reply_id'];
            $dislike->save();

            // determine if user disliked so that we can remove
            $liked = $this->determine_if_user_liked_reply($reply);
            if ($liked) {
                $liked->delete();    
            }
            
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'reason' => "You can't dislike this reply"
            ]);
        }
    }

    /**
    * Like a reply
    */
    public function like_reply(Request $request) {

        $reply = Reply::where('id', $request['reply_id'])->first();
        $liked = $this->determine_if_user_liked_reply($reply);

        if (!$liked) {
            $like = new Reply_like();
            $like->user_id = Auth::user()->id;
            $like->reply_id = $request['reply_id'];
            $like->save();

            // determine if user disliked so that we can remove
            $disliked = $this->determine_if_user_disliked_reply($reply);
            if ($disliked) {
                $disliked->delete();    
            }
            
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'reason' => "You can't like this reply"
            ]);
        }
    }

    /**
    * Determine whether user has disliked post
    */
    private function determine_if_user_disliked_reply(Reply $reply) {

        if (Auth::guest()) {
            return false;
        } else {
            $dislikes = $reply->dislikes(); 
            $disliked = $dislikes->where('user_id', Auth::user()->id)->first();
            if ($disliked === null)
                return false;
            else
                return $disliked;
        }
        
    }

    /**
    * Determine whether user has disliked post
    */
    private function determine_if_user_liked_reply(Reply $reply) {

        if (Auth::guest()) {
            return false;
        } else {
            $likes = $reply->likes(); 
            $liked = $likes->where('user_id', Auth::user()->id)->first();
            if ($liked === null)
                return false;
            else
                return $liked;
        }
    }
}
