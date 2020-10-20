<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZWfpLogs;
use Illuminate\Support\Facades\Crypt;
class WfpLogsController extends Controller
{
    //

    public function getWfpStatusApproved(Request $req){
        if($req->ajax()){
            $wfp_code = Crypt::decryptString($req->wfp_code);
            $a  = ZWfpLogs::where('wfp_code',  $wfp_code)->orderBy('created_at','DESC')->first();
            return $a->remarks == 'APPROVED' ? 'success' : 'failed';
        }else{
            abort(403);
        }
    }

    public function getWfpStatusSubmitted(Request $req){
        if($req->ajax()){
            $wfp_code = Crypt::decryptString($req->wfp_code);
            $a  = ZWfpLogs::where('wfp_code',  $wfp_code)->orderBy('created_at','DESC')->first();
            if($a->remarks == 'NOT SUBMITTED' || $a->remarks == 'FOR REVISION'){
                return 'success';
            }else if($a->remarks == 'APPROVED'){
                return 'approved wfp';
            }else if($a->remarks =='SUBMITTED'){
                return 'submitted wfp';
            }
        }else{
            abort(403);
        }
    }
}
