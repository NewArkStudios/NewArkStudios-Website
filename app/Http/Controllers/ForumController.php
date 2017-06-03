<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /*
    * Get forum post
    */
    public function get_post($category_id){

        $category_name = Category::where('id', $category_id)->value('name');
        return view('pages.thread', ["category_id" => $category_id, "category_name" => $category_name]);
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
        $post->body = $request['body'];

        // save values
        $post->save();

        return redirect('/thanks_post');
    }

    public function display_post($post_id) {

        $post = Post::where('id', $post_id)->first();
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
    public function get_post_list($category_id) {
        $posts = Post::where('category_id', $category_id)->get();
        $category = Category::where('id', $category_id)->first();

        //TODO CHECK FOR EMPTY CATEGEORIES
        return view('pages.thread_posts_list', ['posts' => compact('posts'), 'category' => $category]);
    }
}
