<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GlobalSystemSettings;
use App\RefYear;
use Auth;
use App\TableUnitProgram;
use App\RefProgram;
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

    public function getUserProgramAssigned(){
        $a = TableUnitProgram::join('ref_program','ref_program.id','tbl_unit_program.program_id')
                                ->where('tbl_unit_program.user_id',Auth::user()->id)->get()->toArray();

        return view('components.global.system_set_up_program_assigned',['data' =>$a]);
    }

    public function updateProgramSelected(Request $req){
        $check = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();

        if($check){
            $check->select_program_id = $req->id;
            if($check->save())
            {
                 $data = RefProgram::where('id',$req->id)->first();
                 return response()->json(['message'=>'success','type'=>'update','data'=> $data]);
            }else{
                 return response()->json(['message'=>'error']);
            }
        }else{
            $a = new GlobalSystemSettings;
            $a->user_id = Auth::user()->id;
            $a->select_program_id = $req->id;
           if($a->save())
           {
                $data = RefProgram::where('id',$req->id)->first();
                return response()->json(['message'=>'success','type'=>'insert','data'=> $data]);
           }else{
                return response()->json(['message'=>'error']);
           }
        }
    }
}
