<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Report;
use App\User;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
    * Display the UI for reporting the user
    *@ param Request object
    */
    public function display_report_user(Request $request) {

        $post = null;
        $reply = null;

        $user = Auth::user();
        if (!is_null($request['post_id']))
            $post = Post::where('id', $request['post_id'])->first();
        $suspect = User::where('id', $request['suspect_id'])->first();
        if (!is_null($request['reply_id']))
            $reply = Reply::where('id', $request['reply_id'])->first();
        
        $data = [
            'suspect' => [
                'name' => $suspect->name,
                'id' => $suspect->id
            ],
            'post' => $post,
            'reply' => $reply
        ];
        return view('pages.report', $data);
    }

    /**
    * Function to report user from Form or Ajax request
    */
    public function report_user(Request $request) {
        
        $report = new Report;
        $report->reason = $request['reason'];
        $report->reporter_id = Auth::user()->id;
        $report->post_id = $request['post_id'];
        $report->suspect_id = $request['suspect_id'];
        $report->reply_id = $request['reply_id'];

        $report->save();
        return view('pages.report_thanks');
    }
}
