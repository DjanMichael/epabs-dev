<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\RefActivityOutputFunctions;
use App\RefActivityCategory;
use App\RefSourceOfFund;

class WfpController extends Controller
{
    // 
    public $auth_user_id;
    public $auth_user_unit_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->auth_user_id = Auth::user()->id;
            $this->auth_user_unit_id = Auth::user()->getUnitId();
            return $next($request);
        });
    }

    public function index()
    {
        return view('pages.transaction.wfp.wfp');
    }

    public function goToCreateWfp(){
        $data = [];
        $categ = new RefActivityCategory;
        $sof = new RefSourceOfFund;

        $data["activity_category"] = $categ->getAll();
        $data["sof"] = $sof->getAll();
  
        return view('pages.transaction.wfp.create_wfp',['data' => $data]);
    }

    public function goToDetailsWfp()
    {
        return view('pages.transaction.wfp.wfp_details');
    }

    public function getOutputFunctions()
    {
        $res = RefActivityOutputFunctions::where('user_id' , $this->auth_user_id)->get();
        return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
    }

    public function getSearchOutputFunctions(Request $req)
    {
        $q = $req->q;
        $res = RefActivityOutputFunctions::where('user_id', $this->auth_user_id)
                                            ->where(fn($query) => $query->where('function_description' ,'LIKE', '%'. $q .'%'))
                                            ->get();
        return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
    }
    
    public function userBudgetLineItem()
    {
        $data= [];

        $data["profile"] = \App\UserProfile::where('user_id',$id)->first()->toArray();
        $data['budget_allocation'] = \App\TableUnitBudgetAllocation::join('ref_budget_line_item','ref_budget_line_item.id','tbl_unit_budget_allocation.budget_line_item_id')
                                                                    ->join('ref_year','ref_year.id','tbl_unit_budget_allocation.year_id')
                                                                    ->where('unit_id',$this->auth_user_unit_id)
                                                                    ->where('budget_line_item_id',1)
                                                                    ->where('ref_budget_line_item.status','ACTIVE')
                                                                    ->get()->toArray();
    }


    public function getBudgetLineItem(){
        $data= [];
        
        $data['budget_allocation'] = \App\TableUnitBudgetAllocation::join('ref_budget_line_item','ref_budget_line_item.id','tbl_unit_budget_allocation.budget_line_item_id')
                                                                    ->join('ref_year','ref_year.id','tbl_unit_budget_allocation.year_id')
                                                                    ->where('unit_id',$this->auth_user_unit_id)
                                                                    ->where('ref_budget_line_item.status','ACTIVE')
                                                                    ->get()
                                                                    ->toArray();
        return view('pages.transaction.wfp.component.budget_line_item',['data' => $data]);
    }

    public function getUacsCategory(){
        $data = [];
        $data["category"] = \App\RefUacs::groupBy('category')
                                    ->selectRaw('category')
                                    ->get()->toArray();

       
        return view('pages.transaction.wfp.component.uacs_category',['data'=>$data]);
    }

    public function getCalculateBudgetAllocation(){
        $data =[];
        $id = Auth::user()->id;
        $unit_id = Auth::user()->getUnitId();

        $data["budget_allocation"] = \App\TableUnitBudgetAllocation::join('ref_budget_line_item','ref_budget_line_item.id','tbl_unit_budget_allocation.budget_line_item_id')
                                                                    ->join('ref_year','ref_year.id','tbl_unit_budget_allocation.year_id')
                                                                    ->where('unit_id',$this->auth_user_unit_id)
                                                                    ->where('ref_budget_line_item.status','ACTIVE')
                                                                    ->get()->toArray();
        
    }
}
