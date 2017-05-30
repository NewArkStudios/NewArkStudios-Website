<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class ForumController extends Controller
{
    /*
    * Get forum post
    */
    public function get_post($category_id){
        $categories = Category::all();
        return view('pages.thread', compact('categories'));
    }

    /*
    * Make a forum post and store in database
    */
    public function make_post(Request $request){
        
        // Create new model object
        $post = new Post();

        // set table values
        $post->category_id = $request['category'];
        $post->title = $request['title'];
        $post->body = $request['body'];

        // save values
        $post->save();

        return redirect();
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
        return view('pages.thread_posts_list', ['posts' => compact('posts'), 'category_id' => $category_id]);
    }
}
