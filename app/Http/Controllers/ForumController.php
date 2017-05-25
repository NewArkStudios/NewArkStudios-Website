<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    /*
    * Get forum post
    */
    public function getPost(){
        return view('pages.thread');
    }
}
