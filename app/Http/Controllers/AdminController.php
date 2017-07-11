<?php

namespace App\Http\Controllers;


use App\Models\Announcement;
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
        // note we dont sanitize because ADMINS
        // are trusted with injections including javascript
        $annoucement = new Announcement();
        $annoucement->body = $request['body'];
        $annoucement->save();

        return redirect('/announcements');
    }
}
