<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Views\BudgetAllocationUtilization;
use App\Views\UserInfo;
use App\GlobalSystemSettings;
use Auth;
use App\Events\LoginAuthenticationLog;
use App\TableSystemEvents;
class PageController extends Controller
{

    public function redirectToSystemModule()
    {
        return view('pages.system-menu');
    }

    public function dashboard(Request $req){
        $data =[];
        $program = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();

        if($program){
            $data["user_info"] = UserInfo::where('program_id', $program->select_program_id)
                                        ->where('year_id',$program->select_year)
                                        ->groupBy('program_id')
                                        ->get()->toArray();
            $data["budget_allocation"] = BudgetAllocationUtilization::where('program_id', $program->select_program_id)
                                                ->where('year_id',$program->select_year)
                                                ->groupBy('program_id','budget_line_item_id')
                                                ->get()->toArray();
        }else{
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

    public function getAllEventLogs(Request $req){
        if($req->ajax()){
            $data["logs"] = TableSystemEvents::where('notif_type','LOGS')->limit(100)->orderBy('created_at','DESC')->get();
            return view('components.global.event_logs_item',['data' => $data]);
        }else{
            abort(403);
        }
    }
}
