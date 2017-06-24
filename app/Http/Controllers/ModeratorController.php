<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ModeratorController extends Controller
{
    // display the moderator panel
    public function display_moderator_panel() {

        // Get the list of all reports, this grabs all and 
        // only displays number
        $reports = Report::paginate(5);

        return view('pages.moderator_panel', compact('reports'));
    }
}
