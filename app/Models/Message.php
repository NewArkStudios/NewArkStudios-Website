<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // The table associated with the model
    protected $table = 'messages';

    // columns in table that we are allowed to fill
    protected $fillable = ['messages'];
}
