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

    public function display_edit_announcement($id) {
        $announcement = Announcement::where('id', $id)->first();
        return view('pages.admin_panel', compact('announcement'));
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

    /**
    * Edit existing announcement
    * @param request - request object 
    * id - integer,  announcement id 
    * body - text, edited announcement
    */
    public function edit_announcement(Request $request) {
    
         $announcement = Announcement::where('id', $request['id'])->first();
         $announcement->body = $request['body'];
         $announcement->save();

         return redirect('/announcements');
    }
}
