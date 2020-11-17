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
