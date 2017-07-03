<?php

namespace App\Http\Controllers;


use DB;
use App\User;
use Illuminate\Http\Request;

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
}
