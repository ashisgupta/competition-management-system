<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paper extends Model {

    use SoftDeletes;
    // MASS ASSIGNMENT -------------------------------------------------------
    // we only want these 1 attributes able to be filled
    protected $fillable = array('id','user_id', 'title', 'description','pdfurl','ppturl','videourl');

    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isnt what we named our database table we have to define it
    protected $table = 'papers';

    // DEFINE RELATIONSHIPS --------------------------------------------------
         // each Authuser HAS one role
   public function user()
{
    return $this->belongsTo('App\User','user_id','id');
}

public function reviews()
{
    return $this->hasmany('App\Review', 'paper_id', 'id');
}


}