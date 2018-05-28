<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;use SoftDeletes;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','role_id','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
        protected $primaryKey = "id";

// DEFINE RELATIONSHIPS --------------------------------------------------  
    public function role() {
    return $this->belongsTo('App\Role'); // this matches the Eloquent model
}

    public function review() {
    return $this->hasMany('App\Riview','user_id','id'); // this matches the Eloquent model
}


    public function roles(){
        return $this->belongsToMany('App\UserRole','user_role','user_id','role_id');

    }

    public function hasAnyRole($roles){ 
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }

            }
        }else {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;

    }

    public function hasRole($role){
        if($this->role()->where('name',$role)->first()){
            return true;

        }
        return false;

    }
}
