<?php

namespace App\Http\Controllers;


use DB;
use App\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{

    // Function to display the page where the user can search for
    // users
    public function display_search_user() {
        return view('pages.search_user');
    }

    // Function to search user information
    // case insenstitive search with the lowering of values
    // LIKE operation with everything lowered
    public function search_user(Request $request) {
        
        $search_user = $request['search_user'];
        $users = User::where(DB::raw('lower(name)'), 'LIKE', "%" . strtolower($search_user) . "%")->get();
        return view('pages.search_user_results', compact('users'));
    }

    /**
    * Search for individual posts based on the title
    * @param Request request object
    */
    public function search_post(Request $request) {

        $search_title = $request['search_title'];
        $search_category = $request['search_category'];
        $category = Category::where('slug', $search_category)->first();

        // null check whether user is logged in
        if (is_null(Auth::user())) {
            $moderator = false;
            $admin = false;
        } else {
           $moderator = Auth::user()->hasRole('moderator');
           $admin = Auth::user()->hasRole('admin');
        }

        // specific query based on category and title        
        $posts = Post::where(DB::raw('lower(title)'), 'LIKE', "%" . strtolower($search_title) . "%")
        ->where('category_id', $category->id)->orderBy('updated_at', 'desc')->paginate(5);

        return view('pages.thread_posts_list', ['posts' => compact('posts'),
            'category' => $category,
            'moderator' => $moderator,
            'admin' => $admin
        ]);
    }
}
