<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;
class UserChat extends Model
{
    protected $table="tbl_users_chat_messages";
    protected $fillable =['user_from','username','designation','user_to','pic','message','isRead'];

    public function countUnreadMessage($user_from){
        $a = UserChat::where('user_from',$user_from)
                        ->where('user_to',Auth::user()->id)
                        ->where('isRead','N')->count();
        return $a != null ? $a : 0 ;
    }

    public function updateUnreadMessageToRead($user_from){
        $a = UserChat::where('user_from',$user_from)
                        ->where('user_to',Auth::user()->id)
                        ->update(['isRead'=>'Y']);
        return $a ? true : false;
    }
}
