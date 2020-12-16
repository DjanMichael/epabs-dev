<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiSMS;
class SMSController extends Controller
{

    public function sendMsgToUser(Request $req){
        $a = new ApiSMS;
        $a->sendSMS($req->To,$req->Message);
    }

    public function api_list_view(Request $req){

        if($req->key == '123'){
            $a = ApiSMS::where('status','QUEUE')->get();
            // return response()->json(['key' => $a]);
            return response()->json($a);
        }else{
            return 'Unauthenticated';
        }
    }

    // public function getQueueSMS(){
    //     if($req->ajax()){
    //         $a = ApiSMS::where('status','QUEUE')->get();
    //         return $a;
    //     }else{
    //         abort(403);
    //     }
    // }

    public function updateSMSStatus(Request $req)
    {

        if($req->key == '123'){

            $a = ApiSMS::where('id',$req->id)
                        ->where('status','QUEUE');
            if(count($a->get())){
                $a->update(['status'=>'SENT']);
                return response()->json(['message'=> count($a->get()) . ' Message Successfully Updated']);
            }else{
                return response()->json(['message'=>'No Queuable Msg Found']);
            }

        }else{
            abort(403);
        }
    }
}
