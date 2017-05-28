<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // The table associated with the model
    protected $table = 'posts';

    // columns in table that we are allowed to fill
    protected $fillable = ['category_id', 'title', 'body'];
}
