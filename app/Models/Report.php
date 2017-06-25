<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
     // The table associated with the model
    protected $table = 'reports';

    // columns in table that we are allowed to fill
    protected $fillable = ['reason'];

    /**
    * Get the user who reported this individual
    */
    public function reporter() {
        return $this->hasOne('App\User','id', 'reporter_id');
    }
    
    /**
    * Get the user who reported this individual
    */
    public function suspect() {
        return $this->hasOne('App\User','id', 'suspect_id');
    }

    /**
    * Get the post in question
    */
    public function post() {
        return $this->hasOne('App\Models\Post','id', 'post_id');
    }
    
    /**
    * Get the reply in question
    */
    public function reply() {
        return $this->hasOne('App\Models\Reply','id', 'reply_id');
    }

    /**
    * Get the direct message in question
    */
    public function message() {
        return $this->hasOne('App\Models\Message','id', 'message_id');
    }

    /**
    * Get the direct message reply in question
    */
    public function messagereply() {
        return $this->hasOne('App\Models\MessageReply','id', 'messagereply_id');
    }
}
