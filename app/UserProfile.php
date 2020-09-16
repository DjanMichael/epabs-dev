<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table =  "users_profile";

    public function user(){
            return $this->belongsTo('App\User');
    }

    public function unitBudgetAllocation(){
        return $this->hasMany('App\TableUnitBudgetAllocation','unit_id','unit_id');
    }

   
}
