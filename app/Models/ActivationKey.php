<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivationKey extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activation_keys';
     
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
