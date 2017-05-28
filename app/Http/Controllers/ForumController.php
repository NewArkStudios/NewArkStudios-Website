<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ForumController extends Controller
{
    /*
    * Get forum post
    */
    public function get_post(){
        $categories = Category::all();
        return view('pages.thread', compact('categories'));
    }
}
