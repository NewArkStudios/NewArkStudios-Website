<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // display announcements on page
    public function display_announcements() {

        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.announcements', compact('announcements'));
        
    }
    // display single announcement
    public function display_announcement($id) {

        $announcement = Announcement::where('id', $id)->first();

        // grab the first five announcements
        $recent = Announcement::orderBy('created_at', 'desc')->where('id', '!=', $id)->take(5)->get();

        return view('pages.announcement', [
            'announcement' => $announcement,
            'recent' => $recent
        ]);
    }

    /* get a set of new announcements
     request contains
     start : number representing where we want to start from to grab announcements
     ammount : number of announcements we wish to grab
     returns : JSON object representing the announcements
    */
    public function get_more_announcements(Request $request) {
    
        $start = $request['start'];
        $amount = $request['amount'];

        $announcement_count = Announcement::count();
    
        $announcements = Announcement::orderBy('created_at', 'desc')->where('id', '<=', $announcement_count - $start)->take($amount)->get();

        return response()->json($announcements);
    }
}
