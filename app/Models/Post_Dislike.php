<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_Dislike extends Model
{

    // The table associated with the model
    protected $table = 'post_dislikes';

    // columns in table that we are allowed to fill
    protected $fillable = ['user_id', 'post_id'];

    /**
    * Grab the Post of interest
    */
    public function post() {
        return $this->belongsTo('App\Models\Post','post_id','id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }

}
