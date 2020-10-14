<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefActivityOutputFunctions;
use App\RefActivityCategory;
use App\RefSourceOfFund;
use App\TableUnitBudgetAllocation;
use App\Wfp;
use App\WfpActivity;
use App\WfpPerformanceIndicator;
use App\Views\WfpActivityInfo;
use App\WfpComments;
use App\ZWfpLogs;
use App\RefYear;
use App\UserProfile;
use App\GlobalSystemSettings;
use App\Views\BudgetAllocationUtilization;
use Illuminate\Support\Facades\Crypt;
use DB;
use Auth;
use PDF;

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
            $this->wfp_list_paginate = 9;

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

            return view('components.global.wfp_drawer',['activities'=>$a, 'year' => $year->year , 'user_id'=> (count($a) <> 0 ? $a[0]->user_id : null),'wfp_code'=> (count($a) <> 0 ? Crypt::encryptString($a[0]->code) : null) ]);
        }
    }

    public function generateWfpCode(Request $req){
        $user_id = Auth::user()->id;
        $unit_id = Auth::user()->getUnitId() == null ? (UserProfile::where('user_id',$user_id)->first())->unit_id : Auth::user()->getUnitId() ;
        $year_id = $req->year_id;

        $code = DB::select('CALL generate_wfp_code(?,?,?)' , array($user_id,$unit_id,$year_id));
        $code = $code[0]->wfp_code;
        $check = Wfp::where('user_id',$user_id)
                    ->where('unit_id',$unit_id)
                    ->where('year_id',$year_id)
                    ->first();
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

            // $wfp_act_indi = new WfpPerformanceIndicator;
            // $wfp_act_indi->wfp_code = $code;
            // $wfp_act_indi->save();

            DB::commit();
            //generate code decrypted
            $wfp_code = Crypt::encryptString($wfp->code);
            return  $stat ? ['wfp_code'=> $wfp_code ,'message' =>'success','wfp_act_id'=>  $wfp_act->id] : ['wfp_code'=> Crypt::encryptString($wfp->code) ,'message' =>'not saved'];
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

    }

    public function savePerformaceIndicator(Request $req){

        if($req->ajax()){
            $sum_used_budget_bli  =0;
            $other_act_pi_cost = WfpPerformanceIndicator::where('wfp_act_id',$req->id)
                                                        ->where('bli_id',$req->bli_id)
                                                        ->get();
            $wfp_act = WfpActivity::where('id',$req->id)->first();
            foreach ($other_act_pi_cost as $r){
                $sum_used_budget_bli += $r["cost"];
            }
            //if requested cost is  greater than the activity plan cost
            if(( $sum_used_budget_bli + $req->data["cost"])  > $wfp_act->activity_cost){
                return 'exceeds act budget';
            }

            $wfp_indicator = new WfpPerformanceIndicator;
            $wfp_indicator->wfp_act_id = $req->id;
            $wfp_indicator->wfp_code = Crypt::decryptString($req->data["wfp_code"]);
            $wfp_indicator->uacs_id = $req->data["uacs_title_id"];
            $wfp_indicator->bli_id = $req->data["budget_line_item_id"];
            $wfp_indicator->performance_indicator = $req->data["performance_indicator"];
            $wfp_indicator->cost = $req->data["cost"];
            $wfp_indicator->is_ppmp = $req->data["ppmp_include"] == 'true' ? 'Y' : 'N';
            $wfp_indicator->is_catering = $req->data["catering_include"] == 'true' ? 'Y' : 'N';
            $wfp_indicator->batch = $req->has('batches') ? $req->data["batches"] : '';
            return $wfp_indicator->save() ? 'success' : 'failed';
        }
    }

    public function getAllUnitsWfpList(Request $req){
        $data = [];
        $user_id  = $this->auth_user_id;
        $year_id = GlobalSystemSettings::where('user_id',$user_id)->first();

        if($year_id){

            if($req->q != null){
                $qry = $req->q;
                $data["wfp_list"] = BudgetAllocationUtilization::where('year_id',$year_id->select_year)
                                    ->where('wfp_code','!=',null)
                                    ->where(fn($q) =>
                                        $q->where('name','LIKE', '%' . $qry .'%')
                                        ->orWhere('division','LIKE','%' . $qry .'%')
                                        ->orWhere('section','LIKE','%' . $qry .'%'))
                                    ->groupBy(['unit_id','year_id','user_id'])
                                    ->paginate($this->wfp_list_paginate);
            }else{
                $data["wfp_list"] = BudgetAllocationUtilization::where('year_id',$year_id->select_year)
                                    ->where('wfp_code','!=',null)
                                    ->groupBy(['unit_id','year_id','user_id'])
                                    ->paginate($this->wfp_list_paginate);
            }
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
        $code = Crypt::decryptString($req->wfp_code);
        $categ = new RefActivityCategory;
        $sof = new RefSourceOfFund;

        $data["activity_category"] = $categ->getAll();
        $data["sof"] = $sof->getAll();

        $data["wfp"] = Wfp::where('code',$code)->first();

        // dd($req->wfp_id);
        if($req->wfp_id !='null'){
            $check = WfpActivity::where('id',$req->wfp_id)->first();

            if($check->out_function != null){
                $data["wfp_act"] = WfpActivity::join('tbl_activity_output_function','tbl_activity_output_function.id','tbl_wfp_activity.out_function')
                ->where('tbl_wfp_activity.id','=',$req->wfp_id)->get();

                $month_str = $data["wfp_act"][0]->activity_timeframe;
                $data["activity_timeframe"] = [
                    'jan' => $this->getConvertActivityTimeframeVal($month_str,1),
                    'feb' => $this->getConvertActivityTimeframeVal($month_str,2),
                    'mar' => $this->getConvertActivityTimeframeVal($month_str,3),
                    'apr' => $this->getConvertActivityTimeframeVal($month_str,4),
                    'may' => $this->getConvertActivityTimeframeVal($month_str,5),
                    'june' => $this->getConvertActivityTimeframeVal($month_str,6),
                    'july' => $this->getConvertActivityTimeframeVal($month_str,7),
                    'aug' => $this->getConvertActivityTimeframeVal($month_str,8),
                    'sept' => $this->getConvertActivityTimeframeVal($month_str,9),
                    'oct' => $this->getConvertActivityTimeframeVal($month_str,10),
                    'nov' => $this->getConvertActivityTimeframeVal($month_str,11),
                    'dec' => $this->getConvertActivityTimeframeVal($month_str,12),
                ];

            }else{
                $data["wfp_act"] = $check;
                $data["activity_timeframe"] = [
                    'jan' => 'N',
                    'feb' => 'N',
                    'mar' => 'N',
                    'apr' => 'N',
                    'may' => 'N',
                    'june' => 'N',
                    'july' => 'N',
                    'aug' => 'N',
                    'sept' => 'N',
                    'oct' => 'N',
                    'nov' => 'N',
                    'dec' => 'N'
                ];
            }


            $data["wfp_act_indi"] = WfpPerformanceIndicator::where('wfp_act_id',$req->wfp_id)->get();

            $data["pi_data"] =  WfpPerformanceIndicator::where('wfp_act_id',$req->wfp_id)->get()->toArray();


        }

        // 'year' => $year->year , 'user_id'=> (count($a) <> 0 ? $a[0]->user_id : null),'wfp_code'=> (count($a) <> 0 ? Crypt::encryptString($a[0]->code) : null)
        return view('pages.transaction.wfp.edit_wfp',['data'=> $data,'wfp_code'=>  Crypt::decryptString($req->wfp_code)]);
    }

    public function saveWfpAct(Request $req){
        $data = [];
        $wfp_code = Crypt::decryptString($req->data["wfp_code"]);
        // dd($req->data["output_function"]);
        // dd($req->all());
        $wfp_act = WfpActivity::where('id',$req->id)->first();
        // dd($wfp_act);
        $wfp_act->wfp_code = $wfp_code;
        $wfp_act->out_function =$req->data["output_function"];
        $wfp_act->out_activity =$req->data["activity_output"];
        $wfp_act->activity_category_id =$req->data["activity_categ"];
        $wfp_act->activity_source_of_fund =$req->data["source_of_fund"];
        $wfp_act->activity_timeframe =$req->data["act_timeframe"];
        $wfp_act->responsible_person =$req->data["responsible_person"];
        $wfp_act->target_q1 =$req->data["t_q1"];
        $wfp_act->target_q2 =$req->data["t_q2"];
        $wfp_act->target_q3 =$req->data["t_q3"];
        $wfp_act->target_q4 =$req->data["t_q4"];
        $wfp_act->activity_cost =$req->data["act_cost"];
        $wfp_act->encoded_by = Auth::user()->id;
        $wfp_act->save();

        // dd(Crypt::decryptString($req->wfp_code));

        return ['message'=>'success','id'=>$wfp_act->id];

    }

    public function getPerformanceIndicatorByWfpCode(Request $req){
        $data["pi_data"] =  WfpPerformanceIndicator::join('ref_budget_line_item','ref_budget_line_item.id','tbl_wfp_activity_per_indicator.bli_id')
                                                    ->where('wfp_code',Crypt::decryptString($req->wfp_code))
                                                    ->where('wfp_act_id',$req->wfp_act_id)
                                                    ->select(['*','tbl_wfp_activity_per_indicator.id'])
                                                    ->get()->toArray();
        // dd($data);
        return view('pages.transaction.wfp.table.pi_table',['data' => $data]);
    }

    public function deletePerformanceIndicatorByWfpCode(Request $req){
        if($req->ajax()){
            // dd($req->all());
            $a = WfpPerformanceIndicator::where('id',$req->id)->delete();
            return $a ? ['message'=>'success'] : ['message'=>'failed'];
        }else{
            abort(403);
        }
    }
    public function editPerformanceIndicatorByWfpCode(Request $req){
        if($req->ajax()){
            $a = WfpPerformanceIndicator::join('ref_uacs','ref_uacs.code','tbl_wfp_activity_per_indicator.uacs_id')
                                        ->where('tbl_wfp_activity_per_indicator.id',$req->id)->first();
            return $a ? $a : null;
        }else{
            abort(403);
        }
    }

    public function updatePerformanceIndicatorById(Request $req){
        if($req->ajax()){
            // $code = Crypt::descrytString($req->pi["wfp_code"]);
            // $bli_id =$req->bli_id;


            // $pi_id = WfpPerformanceIndicator::where('id',$req->id)->first();
            // $act_id = $pi_id->wfp_act_id;
            // $sum_used_budget_bli  =0;

            // $other_act_pi_cost = WfpPerformanceIndicator::where('id','!=',$req->id)
            //                                             ->where('wfp_act_id',$act_id)
            //                                             ->where('bli_id',$req->bli_id)
            //                                             ->get();



            // $wfp_act = WfpActivity::where('id',$act_id)->first();

            // if(count($other_act_pi_cost) <> 0){
            //     foreach ($other_act_pi_cost as $r){
            //         $sum_used_budget_bli += $r["cost"];
            //     }
            // }
            // dd( $other_act_pi_cost);

            // //if requested cost is  greater than the activity plan cost
            // if(( $sum_used_budget_bli + $req->pi["cost"])  > $wfp_act->activity_cost){
            //     return 'exceeds budget';
            // }
            $check_balance = BudgetAllocationUtilization::where('wfp_code',Crypt::decryptString($req->pi["wfp_code"]))
                                                        ->where('budget_line_item_id',$req->pi["budget_line_item_id"])
                                                        // ->where('balance_plan','>',$req->cost)
                                                        ->groupBy('budget_line_item_id')
                                                        ->first();

            $bal = $check_balance->program_budget - $check_balance->utilized;
            //if true has budget
            if($bal >= $req->pi["cost"])
            {
                $wfp_indicator = WfpPerformanceIndicator::where('id',$req->id)->first();
                $wfp_indicator->wfp_code = Crypt::decryptString($req->pi["wfp_code"]);
                $wfp_indicator->uacs_id = $req->pi["uacs_title_id"];
                $wfp_indicator->bli_id = $req->pi["budget_line_item_id"];
                $wfp_indicator->performance_indicator = $req->pi["performance_indicator"];
                $wfp_indicator->cost = $req->pi["cost"];
                $wfp_indicator->is_ppmp = $req->pi["ppmp_include"] == 'true' ? 'Y' : 'N';
                $wfp_indicator->is_catering = $req->pi["catering_include"] == 'true' ? 'Y' : 'N';
                $wfp_indicator->batch = $req->has('batches') ? $req->pi["batches"] : '';
                return $wfp_indicator->save() ? 'success' : 'failed';
            }else{
                return 'no budget';
            }

        }else{
            abort(403);
        }
    }

    public function updateWfpActivity(Request $req){
        if($req->ajax()){
            // dd($req->wfp_act);
            $code = Crypt::decryptString($req->wfp_act["wfp_code"]);
            $a = WfpActivity::where('id',$req->wfp_act_id)->first();
            $a->out_function =$req->wfp_act["output_function"];
            $a->out_activity =$req->wfp_act["activity_output"];
            $a->activity_source_of_fund =$req->wfp_act["source_of_fund"];
            $a->activity_category_id =$req->wfp_act["activity_categ"];
            $a->responsible_person =$req->wfp_act["responsible_person"];
            $a->activity_timeframe =$req->wfp_act["act_timeframe"];
            $a->target_q1 =$req->wfp_act["t_q1"] != null ? $req->wfp_act["t_q1"] : null;
            $a->target_q2 =$req->wfp_act["t_q2"] != null ? $req->wfp_act["t_q2"] : null;
            $a->target_q3 =$req->wfp_act["t_q3"] != null ? $req->wfp_act["t_q3"] : null;
            $a->target_q4 =$req->wfp_act["t_q4"] != null ? $req->wfp_act["t_q4"] : null;
            $a->activity_cost =$req->wfp_act["act_cost"];
            $a->encoded_by = Auth::user()->id;
            return $a->save() ? 'success' : 'failed';
        }else{
            abort(403);
        }
    }

    public function getPiPPMP(Request $req){
        if($req->ajax()){
            $data = [];
            $code = Crypt::decryptString($req->wfp_code);
            $data["pi"] = WfpPerformanceIndicator::join('ref_budget_line_item','ref_budget_line_item.id','tbl_wfp_activity_per_indicator.bli_id')
                                            ->where('wfp_code',$code)->get()->toArray();

            return view('pages.transaction.wfp.table.wfp_act_view_pi_ppmp',['data'=>$data]);
        }else{
            abort(403);
        }
    }

    public function getConvertActivityTimeframeVal($str,$req_str = null){
        $arr = explode(',',$str);

        if($req_str != null){
            return $arr[$req_str-1];
        }
    }

    public function updateWfpApprove(Request $req){
        // $a = ZWfpLogs::where('code',Crypt::decryptString($req->wfp_code))->first();
        $a = new ZWfpLogs;
        $a->wfp_code = Crypt::decryptString($req->wfp_code);
        $a->status = 'WFP';
        $a->remarks = 'APPROVED';
        $a->save();
    }


    public function updateWfpSubmit(Request $req){
        // $a = ZWfpLogs::where('code',Crypt::decryptString($req->wfp_code))->first();
        $a = new ZWfpLogs;
        $a->wfp_code = Crypt::decryptString($req->wfp_code);
        $a->status = 'WFP';
        $a->remarks = 'SUBMITTED';
        $a->save();
    }


    public function updateWfpRevise(Request $req){
        // $a = ZWfpLogs::where('code',Crypt::decryptString($req->wfp_code))->first();
        $a = new ZWfpLogs;
        $a->wfp_code = Crypt::decryptString($req->wfp_code);
        $a->status = 'WFP';
        $a->remarks = 'FOR REVISION';
        $a->save();
    }

    public function printUnitWFP(Request $req){
        $code = Crypt::decryptString($req->wfp_code);
        $data = [];

        $data["wfp_a"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','A')->get();
        $data["wfp_b"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','B')->get();
        $data["wfp_c"] =  WfpActivityInfo::where('code',$code)->where('class_sequence','C')->get();

        // dd($data);

        return PDF::loadView('components.global.reports.print_unit_wfp',['data' => $data])
            ->setPaper('a4', 'landscape')
            ->stream('WFPPRINT.pdf');
        // $pdf = PDF::loadView('components.global.reports.print_unit_wfp', ['data' => $data] , [],$config);
        // return $pdf->stream('document.pdf');
    }

    public function newWfpActivity(Request $req){

        $a = new WfpActivity;
        $a->wfp_code = Crypt::decryptString($req->wfp_code);
        $a->encoded_by = Auth::user()->id;
        $a->save();


        $data = [];
        $code = Crypt::decryptString($req->wfp_code);
        $categ = new RefActivityCategory;
        $sof = new RefSourceOfFund;

        $data["activity_category"] = $categ->getAll();
        $data["sof"] = $sof->getAll();

        $data["wfp"] = Wfp::where('code',$code)->first();

        // dd($req->wfp_id);
        if($req->wfp_id !='null'){
            $check = WfpActivity::where('id',$a->id)->first();

            if($check->out_function != null){
                $data["wfp_act"] = WfpActivity::join('tbl_activity_output_function','tbl_activity_output_function.id','tbl_wfp_activity.out_function')
                ->where('tbl_wfp_activity.id','=',$a->id)->get();

                $month_str = $data["wfp_act"][0]->activity_timeframe;
                $data["activity_timeframe"] = [
                    'jan' => $this->getConvertActivityTimeframeVal($month_str,1),
                    'feb' => $this->getConvertActivityTimeframeVal($month_str,2),
                    'mar' => $this->getConvertActivityTimeframeVal($month_str,3),
                    'apr' => $this->getConvertActivityTimeframeVal($month_str,4),
                    'may' => $this->getConvertActivityTimeframeVal($month_str,5),
                    'june' => $this->getConvertActivityTimeframeVal($month_str,6),
                    'july' => $this->getConvertActivityTimeframeVal($month_str,7),
                    'aug' => $this->getConvertActivityTimeframeVal($month_str,8),
                    'sept' => $this->getConvertActivityTimeframeVal($month_str,9),
                    'oct' => $this->getConvertActivityTimeframeVal($month_str,10),
                    'nov' => $this->getConvertActivityTimeframeVal($month_str,11),
                    'dec' => $this->getConvertActivityTimeframeVal($month_str,12),
                ];

            }else{
                $data["wfp_act"] = $check;
                $data["activity_timeframe"] = [
                    'jan' => 'N',
                    'feb' => 'N',
                    'mar' => 'N',
                    'apr' => 'N',
                    'may' => 'N',
                    'june' => 'N',
                    'july' => 'N',
                    'aug' => 'N',
                    'sept' => 'N',
                    'oct' => 'N',
                    'nov' => 'N',
                    'dec' => 'N'
                ];
            }

        }

        $data["wfp_act_indi"] = WfpPerformanceIndicator::where('wfp_act_id',$a->id)->get();
        $data["pi_data"] =  WfpPerformanceIndicator::where('wfp_act_id',$a->id)->get()->toArray();

        return view('pages.transaction.wfp.create_wfp_new_activity',['data' => $data,'wfp_act_id'=>$a->id]);
    }
}
