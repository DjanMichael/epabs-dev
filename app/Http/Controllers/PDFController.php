<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Views\WfpActivityInfo;
use App\Wfp;
use App\RefUnits;
use App\RefYear;
use App\UserProfile;
use App\GlobalSystemSettings;
use App\RefProgram;
use App\WfpPerformanceIndicator;
use App\User;
use Illuminate\Support\Facades\Crypt;
use PDF;
use Auth;


class PDFController extends Controller
{

    public function printUnitWFP(Request $req){
        $code = Crypt::decryptString($req->wfp_code);
        $data = [];

        // $progam_id = (GlobalSystemSettings::where('user_id',Auth::user()->id)->first())->select_program_id;

        $data["wfp"] = Wfp::where('code',$code)->first();
        $data["wfp_program"] = RefProgram::where('id', $data["wfp"]->program_id)->first();
        $data["wfp_unit"] = RefUnits::where('id', $data["wfp"]->unit_id)->first();
        $data["wfp_year"] = RefYear::where('id',$data["wfp"]->year_id)->first();
        $data["wfp_manager"] = User::join('users_profile','users_profile.user_id','users.id')
                                ->where('users.id',$data["wfp"]->user_id)->first();
        $data["wfp_a"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','A')->orderBy('function_description')->get();
        $data["wfp_b"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','B')->orderBy('function_description')->get();
        $data["wfp_c"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','C')->orderBy('function_description')->get();

        // dd($data);
        return PDF::loadView('components.global.reports.print_program_wfp',['data' => $data])
            ->setPaper('a4', 'landscape')
            ->stream('WFPPRINT.pdf');
        // return $pdf->stream('document.pdf');
    }

    public function downloadUnitWFP(Request $req){
        $code = Crypt::decryptString($req->wfp_code);
        $data = [];

        $data["wfp"] = Wfp::where('code',$code)->first();

        $data["wfp_unit"] = RefUnits::where('id', $data["wfp"]->unit_id)->first();
        $data["wfp_year"] = RefYear::where('id',$data["wfp"]->year_id)->first();
        $data["wfp_manager"] = User::join('users_profile','users_profile.user_id','users.id')
                                        ->where('users.id',$data["wfp"]->user_id)->first();
        $data["wfp_a"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','A')->orderBy('function_description')->get();
        $data["wfp_b"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','B')->orderBy('function_description')->get();
        $data["wfp_c"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','C')->orderBy('function_description')->get();

        // dd($data);
        return PDF::loadView('components.global.reports.print_program_wfp',['data' => $data])
            ->setPaper('a4', 'landscape')
            ->download('WFP_' . $code .'.pdf');
        // $pdf = PDF::loadView('components.global.reports.print_unit_wfp', ['data' => $data] , [],$config);
        // return $pdf->stream('document.pdf');
    }

    public function printProgramPPMP(Request $req){
            // dd($req->all());

            $data["wfp"] = Wfp::where('code',$req->wfp_code)->first();

            $data["wfp_program"] = RefProgram::where('id',$data["wfp"]->program_id)->first();
            $data["wfp_unit"] = RefUnits::where('id', $data["wfp"]->unit_id)->first();
            $data["wfp_year"] = RefYear::where('id',$data["wfp"]->year_id)->first();
            $data["wfp_manager"] = UserProfile::where('user_id',$data["wfp"]->user_id)->first();



            $wfp_act_ids = WfpPerformanceIndicator::where('wfp_code',$req->wfp_code)->get()->toArray();
            $pi_ids = [];

            if(count($wfp_act_ids) > 0){
                $i =0;
                for ($i=0; $i < count($wfp_act_ids) ; $i++ ){
                    $pi_ids[$i] = $wfp_act_ids[$i]["id"];
                }
            }
            $vw = "vw_procurement_drum_supplies_items";
            // $data["category"] = \DB::table($vw)->get()->toArray();

            $data["ppmp_items"] = \DB::table('tbl_ppmp_items')
                                        ->join($vw,function($q) use ($vw)
                                        {
                                            $q->on($vw . '.item_type','=','tbl_ppmp_items.item_type');
                                            $q->on($vw . '.id','=','tbl_ppmp_items.item_id');

                                        })
                                        ->join('tbl_wfp_activity_per_indicator','tbl_wfp_activity_per_indicator.id','tbl_ppmp_items.wfp_act_per_indicator_id')
                                        ->whereIn('tbl_ppmp_items.wfp_act_per_indicator_id',$pi_ids)
                                        ->where($vw . '.classification','!=','CATERING SERVICES')
                                        ->get()
                                        ->groupBy('classification')
                                        ->toArray();

            $data["ppmp_catering"] = \DB::table('tbl_ppmp_items')
                                        ->join($vw,function($q) use ($vw)
                                        {
                                            $q->on($vw . '.item_type','=','tbl_ppmp_items.item_type');
                                            $q->on($vw . '.id','=','tbl_ppmp_items.item_id');
                                        })
                                        ->join('tbl_wfp_activity_per_indicator','tbl_wfp_activity_per_indicator.id','tbl_ppmp_items.wfp_act_per_indicator_id')
                                        ->whereIn('tbl_ppmp_items.wfp_act_per_indicator_id',$pi_ids)
                                        ->where($vw . '.classification','=','CATERING SERVICES')
                                        ->get()->groupBy('wfp_act_per_indicator_id')->toArray();


            // $pi_ids = Arr::flatten($pi_ids);
            // dd($data);
            return PDF::loadView('components.global.reports.print_program_ppmp',['data' => $data])
                ->setPaper('a4', 'landscape')
                ->stream('PPMP_'. $req->wfp_code .'.pdf');
                // ->download('PPMP_' . $code .'.pdf');
    }

    public function activityTimeFrameConvertToMonths($txt){
        $arr = explode(',', $txt);
        $str = "";
        $month = ["January","Febuary","March","April","May","June","July","August","September","October","November","December"];
        $i = 0;
        foreach($arr as $r){
            if($i == 11){
                $str .= ($r == 'Y' ? $month[$i] : '');
            }else{
                $str .= ($r == 'Y' ? $month[$i] . ', ' : '');
            }
            $i++;
        }

        $str = rtrim($str, ", ");
        return $str;
    }
}
