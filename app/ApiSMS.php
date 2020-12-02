<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiSMS extends Model
{
    //
    protected $table="tbl_sms_api";
    protected $fillable = ["to","message","service_card","status"];

    public function sendSMS($user_contact,$msg){
        $a = new ApiSMS;
        $a->to = $user_contact;
        $a->message = $msg;
        $a->service_card = 1; //SIM 1 for 1 : 2 for SIM 2
        $a->api_server = env("SMS_API_SERVER");
        $a->save();
        return $a->id;
    }
}
