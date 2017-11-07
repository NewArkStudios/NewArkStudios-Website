<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    // route to display all games
    public function display_all_games() {
        return view('pages.display_all_games');
    }
}
