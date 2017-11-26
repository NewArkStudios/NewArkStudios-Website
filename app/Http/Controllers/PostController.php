<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Post_Like;
use App\Models\Post_Dislike;
use App\Models\Archive_Posts;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    /**
    * Show the individual post
    * @param slug - url safe string that represents the post
    */
    public function display_post($slug) {

        $post = Post::where('slug', $slug)->first();

        // update view count
        $post->views = $post->views + 1;
        $post->save();

        $user = $post->user;
        $replies = $post->replies()->paginate(5);

        // null check whether user is logged in
        if (is_null(Auth::user())) {
            $moderator = false;
            $admin = false;
            $liked_post = false;
            $disliked_post = false;
        } else {
            $moderator = Auth::user()->hasRole('moderator');
            $admin = Auth::user()->hasRole('admin');
            $liked_post = $this->determine_if_user_liked_post($post);
            $disliked_post = $this->determine_if_user_disliked_post($post);
        }

        return view('pages.thread_post', [
            "post"=>$post,
            "user"=>$user,
            "replies"=>$replies,
            "moderator"=>$moderator,
            "admin"=>$admin,
            "liked_post"=>$liked_post,
            "disliked_post"=>$disliked_post,
        ]);
    }

    /*
    * Make a forum post and store in database
    */
    public function make_post(Request $request){
        
        // validate making post information
        $this->validate($request, [
            'title' => 'required|alphanum_space|max:255',
            'body' => 'required'
        ]);

        // Create new model object
        $post = new Post();

        // set table values
        $post->user_id = Auth::user()->id;
        $post->category_id = $request['category'];
        $post->title = $request['title'];
        $post->slug = $this->make_slug($request['title']);

        // sanitate to allow html injection
        $post->body = clean($request['body']);

        // save values
        $post->save();

        return redirect('/thanks_post');
    }


    /**
    * Display the page to edit the post
    */
    public function display_edit_post($post_slug) {

        // check if post belongs to user
        $post = Post::where('slug', $post_slug)->first();
        $user = Auth::user();

        // if doesn't belong
        if ($post->user->id != $user->id)
            return "why are you trying to edit someone else's post";

        return view('pages.thread_edit_post', compact('post'));
    }



    /**
    * Edit the post
    */
    public function edit_post(Request $request) {

        // validate making post information
        $this->validate($request, [
            'title' => 'required|alphanum_space|max:255',
            'body' => 'required'
        ]);

        // check if post belongs to user
        $post = Post::where('slug', $request['post_slug'])->first();
        $user = Auth::user();

        // if doesn't belong
        if ($post->user->id != $user->id)
            return "why are you trying to edit someone else's post";
        
        // store old data from post
        $archived_post = new Archive_Posts();
        $archived_post->post_id = $post->id;
        $archived_post->body = $post->body;
        $archived_post->title = $post->title;
        $archived_post->save();

        $post->body = $request['body'];
        $post->title = $request['title'];
        $post->edited = true;
        $post->save();

        return redirect('post/' . $post->slug);
    }


    /**
    * Like a post
    */
    public function like_post(Request $request) {

        $post = Post::where('id', $request['post_id'])->first();
        $liked = $this->determine_if_user_liked_post($post);

        if (!$liked) {
            $like = new Post_Like();
            $like->user_id = Auth::user()->id;
            $like->post_id = $request['post_id'];
            $like->save();

            // determine if user disliked so that we can remove
            $disliked = $this->determine_if_user_disliked_post($post);
            if ($disliked) {
                $disliked->delete();    
            }
            
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'reason' => "You can't like this post"
            ]);
        }
    }

    /**
    * Like a post
    */
    public function dislike_post(Request $request) {

        $post = Post::where('id', $request['post_id'])->first();
        $disliked = $this->determine_if_user_disliked_post($post);

        if (!$disliked) {
            $dislike = new Post_Dislike();
            $dislike->user_id = Auth::user()->id;
            $dislike->post_id = $request['post_id'];
            $dislike->save();

            // determine if user disliked so that we can remove
            $liked = $this->determine_if_user_liked_post($post);
            if ($liked) {
                $liked->delete();    
            }
            
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'reason' => "You can't dislike this post"
            ]);
        }
    }


    /**
    * Determine whether user has liked post
    */
    private function determine_if_user_liked_post(Post $post) {

        if (Auth::guest()) {
            return false;
        } else {
            $likes = $post->likes(); 
            $liked = $likes->where('user_id', Auth::user()->id)->first();
            if ($liked === null)
                return false;
            else
                return $liked;
        }
        
    }

    /**
    * Determine whether user has disliked post
    */
    private function determine_if_user_disliked_post(Post $post) {

        if (Auth::guest()) {
            return false;
        } else {
            $dislikes = $post->dislikes(); 
            $disliked = $dislikes->where('user_id', Auth::user()->id)->first();
            if ($disliked === null)
                return false;
            else
                return $disliked;
        }
        
    }

    /*
    * Make a unique URL based on the title
    */
    private function make_slug($title) {
        $url = str_slug($title, '-');

        $counter = 1;
        
        // check if entry exists
        if (Post::where('slug', $url)->exists()) {

            $exists = true;
            while ($exists) {
                $url = str_slug($title . "-" . (string)$counter, '-');
                if (!(Post::where('slug', $url)->exists())) {
                    $exists = false; // is this necessary
                    return $url;
                } else 
                    $counter = ++$counter;
            }
        } else
            return $url;
    }
}
