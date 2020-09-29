<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefBudgetLineItem;
use App\UserProfile;
use App\RefUnits;
use App\GlobalSystemSettings;
use Auth;
class BudgetAllocationController extends Controller
{
    //
    public function index(){

        $year = GlobalSystemSettings::join('ref_year','ref_year.id','global_system_settings.select_year')
                                        ->where('user_id',Auth::user()->id)->first();
// $year->select_year
        $data["program_managers"] = UserProfile::join('ref_units','ref_units.id','users_profile.unit_id')
                                                ->join('users','users.id','users_profile.user_id')
                                                ->join('tbl_unit_budget_allocation')
                                                ->get()->toArray();

        dd($data);
        return view('pages.transaction.budget_allocation.budget_allocation',['data'=>$data]);
    }

    public function getAllBLI(){
        $res = RefBudgetLineItem::all();
        return view('pages.transaction.budget_allocation.component.select_bli',['data'=>$res]);
    }
}
