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
        return $this->hasMany('App\Models\Reply');
    }
}
