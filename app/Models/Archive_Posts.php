<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive_Posts extends Model
{

    // The table associated with the model
    protected $table = 'archive_posts';
    
    // columns in table that we are allowed to fill
    protected $fillable = ['title', 'body'];
}
