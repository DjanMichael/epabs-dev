<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TableSystemEvents;
use Auth;
class NotificationController extends Controller
{
    //
    public function getUserNotif(){
        $data["notif"] = TableSystemEvents::where('to_user_id',Auth::user()->id)->orderBy('created_at','DESC')->limit(20)->get()->toArray();

        return view('components.global.user_notification',['data'=>$data]);
    }
}
