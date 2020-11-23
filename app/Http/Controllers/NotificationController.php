<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TableSystemEvents;
use Auth;
use App\GlobalSystemSettings;
class NotificationController extends Controller
{
    //
    public function getUserNotif(){
        if(Auth::user()->role->roles =="PROGRAM COORDINATOR"){
            $settings = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
           if($settings){
                $data["notif"] = TableSystemEvents::where('to_program_id',$settings->select_program_id)->orderBy('created_at','DESC')->limit(50)->get()->toArray();
           }else{
                $data["notif"]  = [];
           }

        }else{
            $data["notif"] = TableSystemEvents::orderBy('created_at','DESC')->limit(100)->get()->toArray();
        }

        return view('components.global.user_notification',['data'=>$data]);
    }

    public function updateNotifToReadById(Request $req){
        if($req->ajax()){
            $this->updateIsReadStatus($req->id);
        }
    }

    public function updateCommentToReadById(Request $req){
        if($req->ajax()){
            $this->updateIsReadStatus($req->id);
        }
    }

    public function updateIsReadStatus($id){
        $a  = TableSystemEvents::where('id',$id)->first();
        $a->isRead ='Y';
        return $a->save() ? 'success' : 'fail';
    }
}
