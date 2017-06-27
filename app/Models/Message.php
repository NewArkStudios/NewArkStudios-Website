<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // The table associated with the model
    protected $table = 'messages';

    // columns in table that we are allowed to fill
    protected $fillable = ['messages'];


    /**
    * Get the user that is the sender
    */
    public function sender() {
        return $this->hasOne('App\User','id', 'sender_id');
    }

    /**
    * Get the user that is the receiver
    */
    public function receiver() {
        return $this->hasOne('App\User','id', 'receiver_id');
    }
}
