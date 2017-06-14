<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
    * Display the admin panel, containing special 
    * stuff the admin can do
    */
    public function display_admin_panel() {
        
        return  Auth::user()->hasRole("admin");

        //return view('pages.admin_panel');
    }
}
