<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // The table associated with the model
    protected $table = 'categories';

    // categories should not be timestamped
    public $timestamps = false;

    // https://laracasts.com/discuss/channels/general-discussion/update-model-that-has-variables-which-are-not-in-the-database-table?page=1
    // by having this public field here we ignore it in saving and is a variable
    // added into the model
    public $postcount = 0;
    public $newest_post; // default empty collection

}
