<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageReply extends Model
{
    // The table associated with the model
    protected $table = 'messagereplies';

    // columns in table that we are allowed to fill
    protected $fillable = ['body'];

    // get the eloquent model for the user associated with the reply
    public function user() {
         return $this->belongsTo('App\User');
    }

    // get the eloquent model for the message associated with the reply
    public function message() {
         return $this->belongsTo('App\Models\Message', 'message_id');
    }
}
