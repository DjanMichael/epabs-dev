<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Views\BudgetAllocationUtilization;
use App\Views\UserInfo;
use App\GlobalSystemSettings;
use Auth;
use App\Events\LoginAuthenticationLog;
use App\TableSystemEvents;
use DB;
use App\Views\ProgramsWfpStatus;
use Illuminate\Support\Collection;
use App\RefYear;
class PageController extends Controller
{
    public $pagination_user_wfp_status;

    public function __construct(){
        $this->pagination_user_wfp_status = 5;
    }

    public function redirectToSystemModule()
    {
        return view('pages.system-menu');
    }

    // public function getStatusData(Request $req){
    //     if($req->ajax()){
    //         $data = [];
    //         $program = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
    //         if($program){
    //             $data["programs_count"] = BudgetAllocationUtilization::where('year_id',$program->select_year)->get()->groupBy('program_id')->count();

    //             $data["wfp"]["wfp_not_submitted"] = collect(DB::select('CALL GET_COUNT_WFP_STATUS(?)' , array($program->select_year)))->where('wfp_status','NOT SUBMITTED')->count();
    //             $data["wfp"]["wfp_submitted"] = collect(DB::select('CALL GET_COUNT_WFP_STATUS(?)' , array($program->select_year)))->where('wfp_status','SUBMITTED')->count();
    //             $data["wfp"]["wfp_approved"] = collect(DB::select('CALL GET_COUNT_WFP_STATUS(?)' , array($program->select_year)))->where('wfp_status','APPROVED')->count();
    //             $data["wfp"]["wfp_revision"] = collect(DB::select('CALL GET_COUNT_WFP_STATUS(?)' , array($program->select_year)))->where('wfp_status','FOR REVISION')->count();

    //             $data["ppmp"]["ppmp_not_submitted"] = collect(DB::select('CALL GET_COUNT_WFP_STATUS(?)' , array($program->select_year)))->where('ppmp_status','NOT SUBMITTED')->count();
    //             $data["ppmp"]["ppmp_submitted"] = collect(DB::select('CALL GET_COUNT_WFP_STATUS(?)' , array($program->select_year)))->where('ppmp_status','SUBMITTED')->count();
    //             $data["ppmp"]["ppmp_approved"] = collect(DB::select('CALL GET_COUNT_WFP_STATUS(?)' , array($program->select_year)))->where('ppmp_status','APPROVED')->count();
    //             $data["ppmp"]["ppmp_revision"] = collect(DB::select('CALL GET_COUNT_WFP_STATUS(?)' , array($program->select_year)))->where('ppmp_status','FOR REVISION')->count();
    //         }else{

    //             $data["wfp"]["wfp_not_submitted"] = null;
    //             $data["wfp"]["wfp_submitted"] = null;
    //             $data["wfp"]["wfp_approved"] = null;
    //             $data["wfp"]["wfp_revision"] = null;
    //             $data["ppmp"]["ppmp_not_submitted"] = null;
    //             $data["ppmp"]["ppmp_submitted"] = null;
    //             $data["ppmp"]["ppmp_approved"] = null;
    //             $data["ppmp"]["ppmp_revision"] = null;
    //         }
    //         dd($data);
    //         return response()->json($data);
    //     }else{
    //         abort(403);
    //     }
    // }

    public function getStatusData2(Request $req){
        if($req->ajax()){
            $data = [];
            $program = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
            if($program){
                $data["programs_count"] = BudgetAllocationUtilization::where('year_id',$program->select_year)->get()->groupBy('program_id')->count();

                $data["wfp"]["wfp_not_submitted"] = collect(DB::select('SELECT * FROM vw_GET_COUNT_WFP_PPMP WHERE year_id =?' , array($program->select_year)))->where('wfp_status','NOT SUBMITTED')->count();
                $data["wfp"]["wfp_submitted"] = collect(DB::select('SELECT * FROM vw_GET_COUNT_WFP_PPMP WHERE year_id =?' , array($program->select_year)))->where('wfp_status','SUBMITTED')->count();
                $data["wfp"]["wfp_approved"] = collect(DB::select('SELECT * FROM vw_GET_COUNT_WFP_PPMP WHERE year_id =?' , array($program->select_year)))->where('wfp_status','APPROVED')->count();
                $data["wfp"]["wfp_revision"] = collect(DB::select('SELECT * FROM vw_GET_COUNT_WFP_PPMP WHERE year_id =?' , array($program->select_year)))->where('wfp_status','FOR REVISION')->count();

                $data["ppmp"]["ppmp_not_submitted"] = collect(DB::select('SELECT * FROM vw_GET_COUNT_WFP_PPMP WHERE year_id =?' , array($program->select_year)))->where('ppmp_status','NOT SUBMITTED')->count();
                $data["ppmp"]["ppmp_submitted"] = collect(DB::select('SELECT * FROM vw_GET_COUNT_WFP_PPMP WHERE year_id =?' , array($program->select_year)))->where('ppmp_status','SUBMITTED')->count();
                $data["ppmp"]["ppmp_approved"] = collect(DB::select('SELECT * FROM vw_GET_COUNT_WFP_PPMP WHERE year_id =?' , array($program->select_year)))->where('ppmp_status','APPROVED')->count();
                $data["ppmp"]["ppmp_revision"] = collect(DB::select('SELECT * FROM vw_GET_COUNT_WFP_PPMP WHERE year_id =?' , array($program->select_year)))->where('ppmp_status','FOR REVISION')->count();
            }else{

                $data["wfp"]["wfp_not_submitted"] = null;
                $data["wfp"]["wfp_submitted"] = null;
                $data["wfp"]["wfp_approved"] = null;
                $data["wfp"]["wfp_revision"] = null;
                $data["ppmp"]["ppmp_not_submitted"] = null;
                $data["ppmp"]["ppmp_submitted"] = null;
                $data["ppmp"]["ppmp_approved"] = null;
                $data["ppmp"]["ppmp_revision"] = null;
            }
            return response()->json($data);
        }else{
            abort(403);
        }
    }
    public function dashboard(Request $req){
        $data =[];
        $program = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();


        if($program){
            $data["year"] = RefYear::where('id',$program->select_year)->first();
            $data["user_info"] = UserInfo::where('program_id', $program->select_program_id)
                                        ->where('year_id',$program->select_year)
                                        ->groupBy('program_id')
                                        ->get()->toArray();
            $data["budget_allocation"] = BudgetAllocationUtilization::where('program_id', $program->select_program_id)
                                                                    ->where('year_id',$program->select_year)
                                                                    ->groupBy('program_id','budget_line_item_id')
                                                                    ->get()->toArray();

        }else{
            $data["year"] = null;
            $data["user_info"] = null;
            $data["budget_allocation"] = null;
        }

        // dd($req->isMobile);
        if($req->isMobile != null){
            broadcast(new LoginAuthenticationLog('Authentication',$req->isMobile))->toOthers();
        }

        // dd($data);
        return view('pages.admin_dashboard',['data'=>$data]);
    }

    public function getProgramStatusList(Request $req){
        if($req->ajax()){
            $program = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();

            if($program){
                if(($req->q != '' || $req->q != null) && ($req->status != '' || $req->status != null) && ($req->status != 'ALL' )){
                    $data["wfp_user_list"] = ProgramsWfpStatus::where('year_id',$program->select_year)
                                                                ->where(fn($q) =>
                                                                    $q->orWhere('name' , 'LIKE','%' . $req->q . '%')
                                                                    ->orWhere('program' , 'LIKE','%' . $req->q . '%')
                                                                )
                                                                ->where('wfp_status', $req->status == 'Revision' ? 'FOR REVISION' : $req->status)
                                                                ->orWhere('ppmp_status', $req->status == 'Revision' ? 'FOR REVISION' : $req->status)
                                                                ->paginate($this->pagination_user_wfp_status);
                }else if($req->q != '' || $req->q != null){
                    $data["wfp_user_list"] = ProgramsWfpStatus::where('year_id',$program->select_year)
                                                                ->where(fn($q) =>
                                                                    $q->orWhere('name' , 'LIKE','%' . $req->q . '%')
                                                                    ->orWhere('program' , 'LIKE','%' . $req->q . '%')
                                                                )
                                                                ->paginate($this->pagination_user_wfp_status);
                }else if($req->status != 'ALL'){
                    $data["wfp_user_list"] = ProgramsWfpStatus::where('year_id',$program->select_year)
                                                                ->where('wfp_status', $req->status == 'Revision' ? 'FOR REVISION' : $req->status)
                                                                ->orWhere('ppmp_status', $req->status == 'Revision' ? 'FOR REVISION' : $req->status)
                                                                ->paginate($this->pagination_user_wfp_status);

                }else{
                    $data["wfp_user_list"] = ProgramsWfpStatus::where('year_id',$program->select_year)
                                                                ->paginate($this->pagination_user_wfp_status);
                }
            }else{
                $data["wfp_user_list"] =null;
            }
            // dd($data);
            return view('components.global.wfp_program_status_list',['data'=>$data]);
        }else{
            abort(403);
        }
    }

    public function getAllEventLogs(Request $req){
        if($req->ajax()){
            $data["logs"] = TableSystemEvents::where('notif_type','LOGS')->limit(100)->orderBy('created_at','DESC')->get();
            return view('components.global.event_logs_item',['data' => $data]);
        }else{
            abort(403);
        }
    }
}
