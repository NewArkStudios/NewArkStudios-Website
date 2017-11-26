<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // The table associated with the model
    protected $table = 'posts';
    
    // columns in table that we are allowed to fill
    protected $fillable = ['category_id', 'title', 'body'];

     // This function allows us to call items sharing the reference
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function replies() {
        return $this->hasMany('App\Models\Reply', 'post_id', 'id');
    }

    public function archive_posts() {
        return $this->hasMany('App\Models\Archive_Posts', 'post_id');
    }

    public function likes() {
        return $this->hasMany('App\Models\Post_Like');
    }

    public function dislikes() {
        return $this->hasMany('App\Models\Post_Dislike');
    }
}
