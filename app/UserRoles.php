<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    //
    protected $table = 'tbl_user_roles';

    protected $fillable =['roles'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
