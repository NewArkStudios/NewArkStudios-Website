<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // display announcements on page
    public function display_announcements() {

        $announcements = Announcement::paginate(5);
        return view('pages.announcements', compact('announcements'));
        
    }
    // display single announcement
    public function display_announcement($id) {

        $announcement = Announcement::where('id', $id)->first();

        // grab the first 
        $recent = Announcement::where('id', '!=', $id)->take(5)->get();

        return view('pages.announcement', [
            'announcement' => $announcement,
            'recent' => $recent
        ]);
    }
}
