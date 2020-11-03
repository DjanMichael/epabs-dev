<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Views\BudgetAllocationUtilization;
use App\Views\UserInfo;
use App\GlobalSystemSettings;
use Auth;
class PageController extends Controller
{

    public function redirectToSystemModule()
    {
        return view('pages.system-menu');
    }

    public function dashboard(){
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
        }

        return view('pages.admin_dashboard',['data'=>$data]);
    }
}
