<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
    * Display the admin panel, containing special 
    * stuff the admin can do
    */
    public function display_admin_panel() {
        return view('pages.admin_panel');
    }
}
