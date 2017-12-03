<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    // The table associated with the model
    protected $table = 'replies';

    // columns in table that we are allowed to fill
    protected $fillable = ['post_id', 'body'];

    // This function allows us to call items sharing the reference
    public function post() {
        return $this->belongsTo('App\Models\Post');
    }

    // This function allows us to call items sharing the reference
    public function user() {
        return $this->belongsTo('App\User');
    }

    // This function allows us to call items sharing the reference
    public function archive_replies() {
        return $this->hasMany('App\Models\Archive_Replies', 'reply_id');
    }

    public function likes() {
        return $this->hasMany('App\Models\Reply_Like');
    }

    public function dislikes() {
        return $this->hasMany('App\Models\Reply_Dislike');
    }
}
