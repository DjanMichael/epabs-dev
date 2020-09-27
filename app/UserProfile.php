<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table =  "users_profile";

    protected $fillable = ['user_id','contact','designation','unit_id','pic'];
    public function user(){
            return $this->belongsTo('App\User');
    }

    public function unitBudgetAllocation(){
        return $this->hasMany('App\TableUnitBudgetAllocation','unit_id','unit_id');
    }

   
}
