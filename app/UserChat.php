<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChat extends Model
{
    protected $table="tbl_users_chat_messages";
    protected $fillable =['user_from','username','designation','user_to','pic','message','isRead'];
}
