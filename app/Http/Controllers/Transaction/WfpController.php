<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\RefActivityOutputFunctions;
use App\RefActivityCategory;
use App\RefSourceOfFund;
use App\TableUnitBudgetAllocation;
use App\Wfp;
use App\WfpActivity;
use App\Views\WfpActivityInfo;
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
        $res = RefActivityOutputFunctions::where('user_id' , $this->auth_user_id)->paginate(10);
        return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
    }

    public function getSearchOutputFunctions(Request $req)
    {
        $q = $req->q;

        if($q !=''){
            $res = RefActivityOutputFunctions::where('user_id', $this->auth_user_id)
            ->where(fn($query) => $query->where('function_description' ,'LIKE', '%'. $q .'%'))
            ->paginate(10);
        }else{
            $res = RefActivityOutputFunctions::where('user_id', $this->auth_user_id)->paginate(10);
        }
 
        return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
    }

    public function getOutputFunctionByPage(Request $req){
        if($req->ajax())
        {
            $res = RefActivityOutputFunctions::where('user_id' , $this->auth_user_id)->paginate(10);
            return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
        }
    }
    
    public function getBudgetLineItem(Request $req){
        $data= [];
        
        $a = \App\TableUnitBudgetAllocation::join('ref_budget_line_item','ref_budget_line_item.id','tbl_unit_budget_allocation.budget_line_item_id')
                                                                    ->join('ref_year','ref_year.id','tbl_unit_budget_allocation.year_id')
                                                                    ->where('unit_id',$this->auth_user_unit_id)
                                                                    ->where('year_id',$req->year_id)
                                                                    ->where('ref_budget_line_item.status','ACTIVE')
                                                                    ->get()
                                                                    ->toArray();

        $data['budget_allocation'] = count($a) > 0 ? $a : []; 
        // dd($data);
        return view('pages.transaction.wfp.component.budget_line_item',['data' => $data]);
    }

    public function getUacsCategory(){
        $data = [];
        $data["category"] = \App\RefUacs::where('status','ACTIVE')
                                    ->groupBy('category')
                                    ->selectRaw('category')
                                    ->get()->toArray();

       
        return view('pages.transaction.wfp.component.uacs_category',['data'=>$data]);
    }

    public function getUacsSubCategory(Request $req){
        $data = [];
        $data["subcategory"] = \App\RefUacs::where('status','ACTIVE')
                                            ->where('category',$req->categ)
                                            ->select('category','subcategory')
                                            ->groupBy('subcategory')
                                            ->distinct()
                                            ->get()->toArray();
        return view('pages.transaction.wfp.component.uacs_subcategory',['data'=>$data]);

    }

    public function getUacsTitle(Request $req){
        $data = [];
        $data["title"] =  \App\RefUacs::where('status','ACTIVE')
                                        ->where('subcategory',$req->subcateg)
                                        ->select('category','subcategory','title')
                                        ->groupBy('title')
                                        ->distinct()
                                        ->get()->toArray();

        return view('pages.transaction.wfp.component.uacs_title',['data'=>$data]);
    }

    public function getUacsCode(Request $req){
        $data = [];
        $data["uacs"] = \App\RefUacs::where('status','ACTIVE')
                                        ->where('title',$req->title)->first();

       return $data["uacs"]->code;
    }

    public function getCalculateBudgetAllocationUtilization(Request $req){
        $a = new TableUnitBudgetAllocation();
        $result = $a->getSingleBudgetAllocationUtilization($req->unit_id,$req->year_id,$req->bli_id);
        
        return $result;
    }

    public function getWfpByCode(Request $req)
    {
        if($req->ajax()){
           
            $a = WfpActivityInfo::where('code',$req->wfp_code)->get();
            return view('components.global.wfp_drawer',['activities'=>$a, 'year' => $a[0]->year]);  
        }
    }
}
