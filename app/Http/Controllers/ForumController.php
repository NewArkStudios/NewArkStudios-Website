<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /*
    * Get forum post
    */
    public function get_post($slug){

        $category = Category::where('slug', $slug)->first();
        return view('pages.thread', ["category_id" => $category->id, "category_name" =>  $category->name]);
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

    /*
    * Make a forum reply and store in database, within iits own table
    */
    public function make_reply(Request $request){
        
        // Create new model object
        $reply = new Reply();

        // set table values
        $reply->user_id = Auth::user()->id;
        $reply->post_id = $request['post_id'];
        $reply->body = $request['body'];

        // find the corresponding post id and change updated_at post to current time
        // with the touch method
        $post = Post::where('id', $request['post_id'])->first();
        $post->touch();

        // save values
        $reply->save();

        return redirect()->back();
    }

    public function display_post($slug) {

        $post = Post::where('slug', $slug)->first();
        $replies = $post->replies;
        return view('pages.thread_post', ["post"=>$post, "replies"=>$replies]);
    }

    /*
    * Display categories that can be viewed by user
    */
    public function view_categories(Request $request) {
        $categories = Category::all();
        return view('pages.thread_categories', compact('categories'));
    }

    /**
    * Display list of all posts available under the category
    */
    public function get_post_list($slug) {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->orderBy('updated_at', 'desc')->get();
        
        //TODO CHECK FOR EMPTY CATEGEORIES
        return view('pages.thread_posts_list', ['posts' => compact('posts'), 'category' => $category]);
    }
}
