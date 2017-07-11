<?php

namespace App\Http\Controllers;


use App\Models\Annoucement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
    * Display the admin panel, containing special 
    * stuff the admin can do
    */
    public function display_admin_panel() {
        return view('pages.admin_panel');
    }

    // Make annoucement and update database
    public function make_announcement(Request $request) {

        // make announcement
        $annoucement = new Annoucement();
        $annoucement->body = $request['body'];
        $annoucement->save();

        return redirect('/announcement');
    }
}
