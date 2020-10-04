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
use App\Views\BudgetAllocationAllYearPerProgram;
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
            $this->budget_allocation_pagination = 10;
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

    public function getBudgetAllocationUtilization(Request $req){
        $data =[];
        $settings = new GlobalSystemSettings;
        // dd($req->year - 0);
        //  dd(BudgetAllocationAllYearPerProgram::all());

        if($req->q == null || $req->q == ''){
            $data["unit_budget_allocation"] = BudgetAllocationAllYearPerProgram::groupBy('t1_unit_id','t1_year_id')
                                                                                ->where('t1_year_id',$req->year - 0)
                                                                                ->orderBy($req->sort != '' ? $req->sort : 't1_year_id' )
                                                                                ->paginate($this->budget_allocation_pagination);
        }else{
            $data["unit_budget_allocation"] = BudgetAllocationAllYearPerProgram::groupBy('t1_unit_id','t1_year_id')
                                                                                ->where('t1_year_id',$req->year - 0)
                                                                                ->where(fn($q) =>
                                                                                $q->orWhere('t1_division','LIKE','%' . $req->q . '%')
                                                                                  ->orWhere('t1_section','LIKE','%' . $req->q . '%')
                                                                                  ->orWhere('t1_name','LIKE','%' . $req->q . '%'))
                                                                                ->orderBy($req->sort != '' ? $req->sort : 't1_year_id' )
                                                                                ->paginate($this->budget_allocation_pagination);

        }
        // dd($data);
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

    public function updateBudgetPerBLIByUser(Request $req){

        if($req->ajax()){
            $edit_data = TableUnitBudgetAllocation::where('budget_line_item_id',$req->r_bli_id)
                                                ->where('unit_id',$req->r_unit_id)
                                                ->where('year_id',$req->r_year_id)
                                                ->first();
            if($edit_data){
                //update new data
                $edit_data->budget_line_item_id = $req->q_bli_id;
                $edit_data->program_budget = $req->q_bli_amount;
                $edit_data->save();
                return 'success';
            }else{
                abort(403);
            }
        }else{
            abort(403);
        }

    }

    public function deleteBudgetPerBLIByUserPerBLI(Request $req){
        if($req->ajax()){
            $del_data = TableUnitBudgetAllocation::where('id',$req->delete_id)->delete();
            if($del_data){
                return 'success';
            }else{
                abort(403);
            }
        }else{
            abort(403);
        }
    }

    public function deleteBudgetPerBLIByUser(Request $req){
        if($req->ajax()){
            $del_allocation_all  = TableUnitBudgetAllocation::where('unit_id',$req->unit_id)
                                                            ->where('year_id',$req->year_id)
                                                            ->delete();
            if($del_allocation_all)                                            {
                return 'success';
            }else{
                abort(403);
            }
        }
    }
}
