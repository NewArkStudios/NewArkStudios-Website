<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
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
        $replies = $post->replies;
        return view('pages.thread_post', ["post"=>$post, "replies"=>$replies]);
    }

    /*
    * Make a forum post and store in database
    */
    public function make_post(Request $request){
        
        // Create new model object
        $post = new Post();

        // set table values
        $post->user_id = Auth::user()->id;
        $post->category_id = $request['category'];
        $post->title = $request['title'];
        $post->slug = $this->make_slug($request['title']);
        $post->body = $request['body'];

        // save values
        $post->save();

        return redirect('/thanks_post');
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
