<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Auth;
use App\GlobalSystemSettings;
use Cache;
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
        'name', 'email', 'password', 'status', 'username', 'role_id'
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

    public function getSelectedProgramId(){
        $res = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
        return $res != null ? $res->select_program_id : null;
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

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function getUserContact($user_id){
        $contact = (\App\UserProfile::where('user_id',$user_id)->first())->contact != '' ? (\App\UserProfile::where('user_id',$user_id)->first())->contact : '';
        return $contact;
    }
}
