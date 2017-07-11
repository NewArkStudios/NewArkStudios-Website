<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // display announcements on page
    public function display_announcements() {

        $announcements = Announcement::all();
        return view('pages.announcements', compact('announcements'));
        
    }
}
