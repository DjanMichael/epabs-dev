<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Views\WfpActivityInfo;
use App\Wfp;
use App\RefUnits;
use App\RefYear;
use App\UserProfile;
use Illuminate\Support\Facades\Crypt;
use PDF;
use Auth;

class PDFController extends Controller
{

    public function printUnitWFP(Request $req){


        $code = Crypt::decryptString($req->wfp_code);
        $data = [];

        $data["wfp"] = Wfp::where('code',$code)->first();

        $data["wfp_unit"] = RefUnits::where('id', $data["wfp"]->unit_id)->first();
        $data["wfp_year"] = RefYear::where('id',$data["wfp"]->year_id)->first();
        $data["wfp_manager"] = UserProfile::where('user_id',$data["wfp"]->user_id)->first();
        $data["wfp_a"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','A')->get();
        $data["wfp_b"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','B')->get();
        $data["wfp_c"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','C')->get();

        // dd($data);
        return PDF::loadView('components.global.reports.print_unit_wfp',['data' => $data])
            ->setPaper('a4', 'landscape')
            ->stream('WFPPRINT.pdf');
        // $pdf = PDF::loadView('components.global.reports.print_unit_wfp', ['data' => $data] , [],$config);
        // return $pdf->stream('document.pdf');
    }

    public function activityTimeFrameConvertToMonths($txt){
        $arr = explode(',', $txt);
        $str = "";
        $month = ["January","Febuary","March","April","May","June","July","August","September","October","December"];
        $i = 0;
        foreach($arr as $r){
            if($i == 11){
                $str .= ($r == 'Y' ? $month[$i] : '');
            }else{
                $str .= ($r == 'Y' ? $month[$i] . ',' : '');
            }
            $i++;
        }

        $str = rtrim($str, ", ");
        return $str;
    }
}
