<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Roles extends Model
{
    // The table associated with the model
    protected $table = "user_roles";

    // roles should not be timestamped
    public $timestamps = false;

}
