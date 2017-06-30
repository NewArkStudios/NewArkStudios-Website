<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Chromabits\Purifier\Contracts\Purifier;
use HTMLPurifier_Config;

class ReplyController extends Controller
{

    protected $purifier;

    /**
	 * Construct an instance of MyClass
	 *
	 * @param Purifier $purifier
	 */
	public function __construct(Purifier $purifier) {
		// Inject dependencies
		$this->purifier = $purifier;
	}

    /*
    * Make a forum reply and store in database, within iits own table
    */
    public function make_reply(Request $request){
        
        
        // Create new model object
        $reply = new Reply();

        // set table values
        $reply->user_id = Auth::user()->id;
        $reply->post_id = $request['post_id'];
        $reply->body = $this->purifier->clean($request['body']);

        // find the corresponding post id and change updated_at post to current time
        // with the touch method
        $post = Post::where('id', $request['post_id'])->first();

        // check whether post is closed, somehow someone makes post request anyways
        if ($post->close)
            return "post is closed";

        $post->touch();

        // save values
        $reply->save();

        return redirect()->back();
    }
}
