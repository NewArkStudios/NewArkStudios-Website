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
    public function display_create_post($slug){

        $category = Category::where('slug', $slug)->first();
        return view('pages.thread', ["category_id" => $category->id, "category_name" =>  $category->name]);
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
        $posts = Post::where('category_id', $category->id)
        ->orderBy('updated_at', 'desc')
        ->orderBy('pinned', 'desc')
        ->paginate(5);
        
        // null check whether user is logged in
        if (is_null(Auth::user())) {
            $moderator = false;
            $admin = false;
        } else {
           $moderator = Auth::user()->hasRole('moderator');
           $admin = Auth::user()->hasRole('admin');
        }

        //TODO CHECK FOR EMPTY CATEGEORIES
        return view('pages.thread_posts_list', ['posts' => compact('posts'),
            'category' => $category,
            'moderator' => $moderator,
            'admin' => $admin
        ]);
    }

    
}
