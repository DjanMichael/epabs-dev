<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Auth;
class User extends Authenticatable
{

    // protected $table = 'tbl_users';
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'role_id'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne('App\UserProfile','user_id','id');
    }

    public function role(){
        return $this->hasOne('App\UserRoles','role_id','role_id');
    }


    public function getUnitId(){
        $res = $this->profile != null ? \App\UserProfile::where('unit_id',$this->profile->unit_id)->where('user_id',Auth::user()->id)->first() : null;
        if($res){
            $res2 = \App\RefUnits::where('id',$res->unit_id)->first();
            return ($res2 != null) ? $res2->id : null;
        }else{
            return null;
        }
    }


    public function getUnit(){
        $res = $this->profile != null ? \App\UserProfile::where('id',$this->profile->unit_id)->where('user_id',Auth::user()->id)->first() : null;

        if($res){
            $res2 = \App\RefUnits::where('id',$res->unit_id)->first();
            return $res2->division . ' / ' . $res2->section;
        }else{
            return null;
        }
    }
}
