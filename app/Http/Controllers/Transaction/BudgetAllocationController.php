<?php

namespace App\Http\Controllers\Transaction;

use App\GlobalSystemSettings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefBudgetLineItem;
use App\UserProfile;
use App\RefUnits;
use App\Views\BudgetAllocationUtilization;
use Auth;
use App\RefYear;
use App\TableUnitBudgetAllocation;
class BudgetAllocationController extends Controller
{


    public $auth_user_id;
    public $auth_user_unit_id;
    public $budget_allocation_pagination;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->auth_user_id = Auth::user()->id;
            $this->auth_user_unit_id = Auth::user()->getUnitId();
            $this->budget_allocation_pagination = 5;
            return $next($request);
        });
    }


    public function index(){

        // $check = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
        // dd($data);
        return view('pages.transaction.budget_allocation.budget_allocation',['data'=>[]]);
    }

    public function getAllBLI(){
        $res = RefBudgetLineItem::all();
        return view('pages.transaction.budget_allocation.component.select_bli',['data'=>$res]);
    }

    public function getBudgetAllocationUtilization(){
        $data =[];
        $settings = new GlobalSystemSettings;
        if($settings->getYearSelectedByUser() != null){
            $data["unit_budget_allocation"] = BudgetAllocationUtilization::groupBy('unit_id','year_id')
                                                                        ->where('year_id',$settings->getYearSelectedByUser())
                                                                        ->paginate($this->budget_allocation_pagination);
        }
        return view('pages.transaction.budget_allocation.component.table_unit_budget_allocation',['data'=>$data]);
    }

    public function getBudgetAllocationPerBLIByUser(Request $req){
        $data = [];
        $data["unit_per_user_budget"] = BudgetAllocationUtilization::where('user_id',$req->user_id)
                                                                    ->where('unit_id',$req->unit_id)
                                                                    ->where('year_id',$req->year_id)
                                                                    ->get()->toArray();
        // dd($data);
        return view('pages.transaction.budget_allocation.component.table_unit_bli_allocation',['data'=>$data]);
    }

    public function saveBudgetAllocationUnit(Request $req){
        if($req->ajax()){
            $check = TableUnitBudgetAllocation::where('budget_line_item_id',$req->budget_line_item_id)
                                                ->where('unit_id',$req->unit_id)
                                                ->where('year_id',$req->year_id)
                                                ->first();
            //check for duplicates on budget line item
            if($check){
                return 'duplicate';
            }else{
                $budget = new TableUnitBudgetAllocation;
                $budget->unit_id = $req->unit_id;
                $budget->budget_line_item_id = $req->budget_line_item_id;
                $budget->program_budget = $req->amount;
                $budget->year_id = $req->year_id;
                return $budget->save() ? 'success' : 'failed';
            }

        }else{
            abort(403);
        }
    }
}
