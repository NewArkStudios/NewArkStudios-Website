<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    // The table associated with the model
    protected $table = 'announcements';

    // columns in table that we are allowed to fill
    protected $fillable = ['body'];
}
