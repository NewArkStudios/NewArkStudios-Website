<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
     // The table associated with the model
    protected $table = 'reports';

    // columns in table that we are allowed to fill
    protected $fillable = ['reason'];
}
