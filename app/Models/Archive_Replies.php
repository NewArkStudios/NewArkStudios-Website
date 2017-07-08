<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive_Replies extends Model
{
    // The table associated with the model
    protected $table = 'archive_replies';

    // columns in table that we are allowed to fill
    protected $fillable = ['body'];
}
