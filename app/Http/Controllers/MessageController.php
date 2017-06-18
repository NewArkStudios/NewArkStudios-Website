<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
    * Display the UI page to actually send a direct message
    */
    public function display_make_message($receiver_name) {
        return view('pages.message_make');
    }
}
