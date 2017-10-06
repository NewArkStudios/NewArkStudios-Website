<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile_Image extends Model
{
    // name of the table
    protected $table = 'profile_images';

    //
    public function role() {
        return $this->hasOne('App\Models\Roles', 'id');
    }
}
