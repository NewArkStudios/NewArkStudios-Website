<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    // route to display all games
    public function display_all_games() {
        return view('pages.display_all_games');
    }

    // route to display all games
    public function display_foldrum() {
        return view('pages.display_foldrum');
    }

    // route to display all games
    public function demo_foldrum() {
        return view('pages.demo_foldrum');
    }
}
