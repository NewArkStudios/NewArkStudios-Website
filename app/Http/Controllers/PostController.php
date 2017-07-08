<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
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
        $user = $post->user;
        $replies = $post->replies;

        // null check whether user is logged in
        if (is_null(Auth::user())) {
            $moderator = false;
            $admin = false;
        } else {
           $moderator = Auth::user()->hasRole('moderator');
           $admin = Auth::user()->hasRole('admin');
        }

        return view('pages.thread_post', [
            "post"=>$post,
            "user"=>$user,
            "replies"=>$replies,
            "moderator"=>$moderator,
            "admin"=>$admin,
        ]);
    }

    /*
    * Make a forum post and store in database
    */
    public function make_post(Request $request){
        
        // validate making post information
        $this->validate($request, [
            'title' => 'required|max:255',
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
            'title' => 'required|max:255',
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
