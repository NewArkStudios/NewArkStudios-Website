<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Get the roles of the user, all the roles user own
    * based off a pivot table, remember DB3 that class was useful
    * @return - Eloquent object that grabs role that belong to user
    */
    public function roles(){
       
       return $this->belongsToMany('App\Models\Roles', 'user_roles', 'role_id', 'user_id');
    }

    /**
    * Check whether the user has a specific role
    * @param role - string containing the role we would like to check
    * @return Boolean whether the role is exists with the user
    */
    public function hasRole($role) {

        $roles_results = $this->roles;

        $roles_array = [];

        // loop through roles and get name and place in array
        foreach($roles_results as $role_item) {
            array_push($roles_array,$role_item->name);
        }

        return in_array($role, $roles_array);
    }
}
