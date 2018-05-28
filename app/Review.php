<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model {

    use SoftDeletes;
    // MASS ASSIGNMENT -------------------------------------------------------
    // we only want these 1 attributes able to be filled
    protected $fillable = array('paper_id','user_id', 'quality', 'content','performance','remark');

    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isnt what we named our database table we have to define it
    protected $table = 'reviews';

     protected $dates = ['deleted_at'];


    // DEFINE RELATIONSHIPS --------------------------------------------------
         // each Authuser HAS one review
   public function user()
{
    return $this->belongsTo('App\User','user_id','id');
}

public function paper()
{
    return $this->belongsTo('App\Paper','paper_id','id');
}


}