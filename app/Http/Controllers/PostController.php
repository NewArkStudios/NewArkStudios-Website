<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Chromabits\Purifier\Contracts\Purifier;
use HTMLPurifier_Config;


class PostController extends Controller
{

    protected $purifier;

    /**
	 * Construct an instance of MyClass
	 *
	 * @param Purifier $purifier
	 */
	public function __construct(Purifier $purifier) {
		// Inject dependencies
		$this->purifier = $purifier;
	}

    /**
    * Show the individual post
    * @param slug - url safe string that represents the post
    */
    public function display_post($slug) {

        $post = Post::where('slug', $slug)->first();
        $user = $post->user;
        $replies = $post->replies;
        return view('pages.thread_post', ["post"=>$post, "user"=>$user, "replies"=>$replies]);
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
        $post->body = $this->purifier->clean($request['body']);

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

        return view('pages.thread_edit', compact('post'));
    }

    /**
    * Edit the post
    */
    public function edit_post(Request $request) {

        // check if post belongs to user
        $post = Post::where('slug', $request['post_slug'])->first();
        $user = Auth::user();

        // if doesn't belong
        if ($post->user->id != $user->id)
            return "why are you trying to edit someone else's post";
        
        $post->body = $request['body'];
        $post->edited = true;
        $post->save();

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
