<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply_Like extends Model
{
    // The table associated with the model
    protected $table = 'reply_likes';

    // columns in table that we are allowed to fill
    protected $fillable = ['user_id', 'reply_id'];

    /**
    * Grab the Post of interest
    */
    public function post() {
        return $this->belongsTo('App\Models\Reply','reply_id','id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }
}
