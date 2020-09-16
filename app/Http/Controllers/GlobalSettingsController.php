<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GlobalSystemSettings;
use App\RefYear;
use Auth;
class GlobalSettingsController extends Controller
{
    //
    public function updateUserYear(Request $req)
    {
        $check = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
        
        if($check){
            //update
            $check->select_year = $req->id;
            if($check->save())
           {
                $data = RefYear::where('id',$req->id)->first();
                return response()->json(['message'=>'success','type'=>'update','data'=> $data]);
           }else{
                return response()->json(['message'=>'error']);
           }
        }else{
            //insert
            $a = new GlobalSystemSettings;
            $a->user_id = Auth::user()->id;
            $a->select_year = $req->id;
           if($a->save())
           {
                $data = RefYear::where('id',$req->id)->first();
                return response()->json(['message'=>'success','type'=>'insert','data'=> $data]);
           }else{
                return response()->json(['message'=>'error']);
           }
        }
    }

    public function getUserYear(){
        $a = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
        return response()->json(['data'=> $a]);
    }
}
