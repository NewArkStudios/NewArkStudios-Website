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
    public function get_post(){
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
}
