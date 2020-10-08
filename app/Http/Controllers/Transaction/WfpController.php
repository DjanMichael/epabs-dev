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
use DB;
use App\RefYear;
use App\UserProfile;
use App\GlobalSystemSettings;
use App\Views\BudgetAllocationUtilization;
use Illuminate\Support\Facades\Crypt;
use App\WfpPerformanceIndicator;
use App\WfpComments;
use App\ZWfpLogs;
use App\Views\BudgetAllocationAllYearPerProgram;

class WfpController extends Controller
{
    //
    public $auth_user_id;
    public $auth_user_unit_id;



    // wfp performance table settings
    public $pi_table_paginate;

    //wfp list table settings
    public $wfp_list_paginate;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->auth_user_id = Auth::user()->id;
            $this->auth_user_unit_id = Auth::user()->getUnitId() == null ? (UserProfile::where('user_id',$this->auth_user_id)->first())->unit_id : Auth::user()->getUnitId() ;

            // wfp performance table settings
            $this->pi_table_paginate = 3;

            //wfp list table settings
            $this->wfp_list_paginate = 6;

            return $next($request);
        });
    }

    public function index()
    {
        $data["year"] = RefYear::all();
        return view('pages.transaction.wfp.wfp',['data' => $data]);
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
        $res = RefActivityOutputFunctions::where('user_id' , $this->auth_user_id)->paginate($this->pi_table_paginate);
        return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
    }

    public function getSearchOutputFunctions(Request $req)
    {
        $q = $req->q;

        if($q !=''){
            $res = RefActivityOutputFunctions::where('user_id', $this->auth_user_id)
            ->where(fn($query) => $query->where('function_description' ,'LIKE', '%'. $q .'%'))
            ->paginate($this->pi_table_paginate);
        }else{
            $res = RefActivityOutputFunctions::where('user_id', $this->auth_user_id)->paginate($this->pi_table_paginate);
        }
        return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
    }

    public function getOutputFunctionByPage(Request $req){
        if($req->ajax())
        {
            if ($req->q !=''){
                $res = RefActivityOutputFunctions::where('user_id' , $this->auth_user_id)
                                                ->where('function_description','LIKE', '%' . $req->q . '%')
                                                ->paginate($this->pi_table_paginate);
            }else{
                $res = RefActivityOutputFunctions::where('user_id' , $this->auth_user_id)->paginate($this->pi_table_paginate);
            }
            return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
        }
    }

    public function getBudgetLineItem(Request $req){
        $data= [];
        $unit_id = Auth::user()->getUnitId() == null ? (UserProfile::where('user_id',$this->auth_user_id)->first())->unit_id : Auth::user()->getUnitId() ;
        $a = \App\TableUnitBudgetAllocation::join('ref_budget_line_item','ref_budget_line_item.id','tbl_unit_budget_allocation.budget_line_item_id')
                                                                    ->join('ref_year','ref_year.id','tbl_unit_budget_allocation.year_id')
                                                                    ->where('unit_id', $unit_id)
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
        // $a = new TableUnitBudgetAllocation();
        $unit_id = Auth::user()->getUnitId() == null ? (UserProfile::where('user_id',$this->auth_user_id)->first())->unit_id : Auth::user()->getUnitId();
        $vw_allocation = BudgetAllocationAllYearPerProgram::where('unit_id',$unit_id)
                                                        ->where('year_id',$req->year_id)
                                                        ->where('budget_line_item_id',$req->bli_id)
                                                        ->first();

        // $result = $a->getSingleBudgetAllocationUtilization(,$req->year_id,$req->bli_id);

        return $vw_allocation;
    }

    public function getWfpByCode(Request $req)
    {
        if($req->ajax()){
            $a = WfpActivityInfo::where('code',$req->wfp_code)->get();
            $year_id = GlobalSystemSettings::where('user_id',$this->auth_user_id)->first();
            $year_id = $year_id->select_year;
            $year = RefYear::where('id',$year_id)->first();

            return view('components.global.wfp_drawer',['activities'=>$a, 'year' => $year->year , 'user_id'=> (count($a) <> 0 ? $a[0]->user_id : null),'wfp_code'=> (count($a) <> 0 ? $a[0]->code : null) ]);
        }
    }

    public function generateWfpCode(Request $req){
        $user_id = Auth::user()->id;
        $unit_id = Auth::user()->getUnitId() == null ? (UserProfile::where('user_id',$user_id)->first())->unit_id : Auth::user()->getUnitId() ;
        $year_id = $req->year_id;

        $code = DB::select('CALL generate_wfp_code(?,?,?)' , array($user_id,$unit_id,$year_id));
        $code = $code[0]->wfp_code;
        $check = Wfp::where('user_id',$user_id)->where('unit_id',$unit_id)->where('year_id',$year_id)->first();
        $unitHasBadget = TableUnitBudgetAllocation::where('unit_id',$unit_id)->where('year_id',$year_id)->first();
        if($check){
            return ['message'=>'duplicate'];
        }

        if($unitHasBadget == null){
            return ['message'=>'no budget'];

        }


        try {
            DB::beginTransaction();

            $wfp_log = new ZWfpLogs;
            $wfp_log->wfp_code = $code;
            $wfp_log->status = 'WFP';
            $wfp_log->remarks = 'NOT SUBMITTED';
            $wfp_log->save();

            $wfp = new Wfp;
            $wfp->code = $code;
            $wfp->user_id = $user_id;
            $wfp->unit_id = $unit_id;
            $wfp->year_id = $year_id;
            $stat = $wfp->save();

            $wfp_act = new WfpActivity;
            $wfp_act->wfp_code = $code;
            $wfp_act->encoded_by =  $this->auth_user_id;
            $wfp_act->save();

            $wfp_act_indi = new WfpPerformanceIndicator;
            $wfp_act_indi->wfp_code = $code;
            $wfp_act_indi->save();

            DB::commit();
            //generate code decrypted
            $wfp_code = Crypt::encryptString($wfp->code);
            return  $stat ? ['wfp_code'=> $wfp_code ,'message' =>'success'] : ['wfp_code'=> Crypt::encryptString($wfp->code) ,'message' =>'not saved'];
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

    }

    public function savePerformaceIndicator(Request $req){
        // dd($req->wfp_code);
        // dd($req->uacs_title_id);

        if($req->ajax()){

            $wfp_indicator = WfpPerformanceIndicator::where('wfp_code',$req->wfp_code)->first();
            $wfp_indicator->wfp_code = Crypt::decryptString($req->wfp_code);
            $wfp_indicator->uacs_id = $req->uacs_title_id;
            $wfp_indicator->bli_id = $req->budget_line_item_id;
            $wfp_indicator->performance_indicator = $req->performance_indicator;
            $wfp_indicator->cost = $req->cost;
            $wfp_indicator->is_ppmp = $req->ppmp_include ? 'Y' : 'N';
            $wfp_indicator->is_catering = $req->catering_include ? 'Y' : 'N';
            $wfp_indicator->batch = $req->has('batches') ? $req->batches : '';
            return $wfp_indicator->save() ? 'success' : 'failed';
        }
    }

    public function getAllUnitsWfpList(Request $req){
        $data = [];
        $user_id  = $this->auth_user_id;
        // $unit_id = Auth::user()->getUnitId() == null ? (UserProfile::where('user_id',$user_id)->first())->unit_id : Auth::user()->getUnitId() ;
        $year_id = GlobalSystemSettings::where('user_id',$user_id)->first();
        if($year_id){
            // where('unit_id',$unit_id)
            // ->where('year_id', $year_id->select_year)
            $data["wfp_list"] = BudgetAllocationUtilization::where('year_id',$year_id->select_year)
                                                        ->where('wfp_code','!=',null)
                                                        ->groupBy(['unit_id','year_id','user_id'])
                                                        ->paginate($this->wfp_list_paginate);

            if(count($data["wfp_list"]) <> 0){

                return view('pages.transaction.wfp.table.wfp_list',['data'=> $data]);
            }else{
                return view('pages.transaction.wfp.table.wfp_list',['data'=> null]);
            }
        }else{
            return 'no year set';
        }
    }
    function saveWfpComments(Request $req){
        if($req->ajax()){
            $a = new WfpComments;
            $a->wfp_code = $req->wfp_code;
            $a->user_id = $req->user_id;
            $a->comment = $req->comment;
            return $a->save() ? 'success' : 'failed';
        }else{
            abort(403);
        }
    }

    function editWfp(Request $req){
        // dd($req->all());
        $data = [];
        $categ = new RefActivityCategory;
        $sof = new RefSourceOfFund;

        $data["activity_category"] = $categ->getAll();
        $data["sof"] = $sof->getAll();

        $data["wfp"] = Wfp::where('code',$req->wfp_code)->first();
        $data["wfp_act"] = WfpActivity::where('wfp_code',$req->wfp_code)->get();
        $data["wfp_act_indi"] = WfpPerformanceIndicator::where('wfp_code',$req->wfp_code)->get();

        return view('pages.transaction.wfp.edit_wfp',['data'=> $data]);
    }
    public function checkingWfpPiOnSave(Request $req){
        $check_pi = WfpPerformanceIndicator::where('wfp_code',$req->wfp_code)->first();
        if(!$check_pi){
            return ['message'=>'not found'];
        }else{
            return ['message'=>'found'];
        }
    }

    public function saveWfpAct(Request $req){
        $data = [];
        $wfp_code = Crypt::decryptString($req->wfp_code);
        // dd($req->all());
        $wfp_act = WfpActivity::where('wfp_code',$wfp_code)->first();

        // dd($wfp_act);
        $wfp_act->out_function =$req->output_function;
        $wfp_act->out_activity =$req->activity_output;
        $wfp_act->activity_category_id =$req->activity_categ;
        $wfp_act->activity_source_of_fund =$req->source_of_fund;
        $wfp_act->activity_timeframe =$req->act_timeframe;
        $wfp_act->responsible_person =$req->responsible_person;
        $wfp_act->target_q1 =$req->t_q1;
        $wfp_act->target_q2 =$req->t_q2;
        $wfp_act->target_q3 =$req->t_q3;
        $wfp_act->target_q4 =$req->t_q4;
        $wfp_act->activity_cost =$req->output_function;
        $wfp_act->save();

        // dd(Crypt::decryptString($req->wfp_code));

        return ['message'=>'success'];

    }
}
