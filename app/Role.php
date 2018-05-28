<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    // MASS ASSIGNMENT -------------------------------------------------------
    // we only want these 1 attributes able to be filled
    protected $fillable = array('name');

    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isnt what we named our database table we have to define it
    protected $table = 'roles';

    // DEFINE RELATIONSHIPS --------------------------------------------------
         // each Authuser HAS one role
   public function users()
{
    return $this->hasMany('App\User');
}

}