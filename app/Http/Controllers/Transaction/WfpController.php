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
use App\TablePiCateringBatches;
use App\TableSystemEvents;
use App\Events\NotifyUserWfpStatus;
use Illuminate\Support\Facades\Crypt;
use DB;
use Auth;
use PDF;
use App\User;
use App\RefProgram;
use App\ProgramConap;
use App\ApiSMS;
use App\Views\BudgetAllocationAllYearPerProgram;
use App\Views\WfpListByProgram;
class WfpController extends Controller
{
    //
    public $auth_user_id;
    public $auth_user_unit_id;
    public $auth_user_program_id;
    public $year_id;
    // wfp performance table settings
    public $pi_table_paginate;

    //wfp list table settings
    public $wfp_list_paginate;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->auth_user_id = Auth::user()->id;
            $this->auth_user_unit_id = Auth::user()->getUnitId() == null ? (UserProfile::where('user_id',$this->auth_user_id)->first())->unit_id : Auth::user()->getUnitId() ;
            $check_if_has_settings = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
            $this->auth_user_program_id =  $check_if_has_settings ? (GlobalSystemSettings::where('user_id',Auth::user()->id)->first())->select_program_id : 0;
            $this->year_id = $check_if_has_settings ? (GlobalSystemSettings::where('user_id',Auth::user()->id)->first())->select_year : 0;
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
        $settings = GlobalSystemSettings::where('user_id',$this->auth_user_id)->first();
        $t = "tbl_activity_output_function";
        $res = RefActivityOutputFunctions::join('ref_function_deliverables','ref_function_deliverables.id','tbl_activity_output_function.output_function_id')
                                            ->select($t .'.id',$t .'.description','ref_function_deliverables.function_class')
                                            ->where('user_id' , $this->auth_user_id)
                                            ->where('program_id',$settings->select_program_id)->paginate($this->pi_table_paginate);
        return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
    }

    public function getSearchOutputFunctions(Request $req)
    {
        $settings = GlobalSystemSettings::where('user_id',$this->auth_user_id)->first();
        $q = $req->q;
        $t = "tbl_activity_output_function";
        if($q !=''){
            $res = RefActivityOutputFunctions::join('ref_function_deliverables','ref_function_deliverables.id','tbl_activity_output_function.output_function_id')
                                            ->select($t .'.id',$t .'.description','ref_function_deliverables.function_class')
                                            ->where('user_id', $this->auth_user_id)
                                            ->where('program_id',$settings->select_program_id)
                                            ->where(fn($query) => $query->where('description' ,'LIKE', '%'. $q .'%'))
                                            ->paginate($this->pi_table_paginate);
        }else{
            $res = RefActivityOutputFunctions::join('ref_function_deliverables','ref_function_deliverables.id','tbl_activity_output_function.output_function_id')
                                            ->select($t .'.id',$t .'.description','ref_function_deliverables.function_class')
                                            ->where('user_id', $this->auth_user_id)
                                            ->where('program_id',$settings->select_program_id)
                                            ->paginate($this->pi_table_paginate);
        }
        // dd($res);
        return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
    }

    public function getOutputFunctionByPage(Request $req){
        if($req->ajax())
        {
            $settings = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
            $t = "tbl_activity_output_function";
            if ($req->q !=''){
                $res = RefActivityOutputFunctions::join('ref_function_deliverables','ref_function_deliverables.id','tbl_activity_output_function.output_function_id')
                                                ->select($t .'.id',$t .'.description','ref_function_deliverables.function_class')
                                                ->where('user_id' , $this->auth_user_id)
                                                ->where('description','LIKE', '%' . $req->q . '%')
                                                ->paginate($this->pi_table_paginate);
            }else{
                $res = RefActivityOutputFunctions::join('ref_function_deliverables','ref_function_deliverables.id','tbl_activity_output_function.output_function_id')
                                                ->select($t .'.id',$t .'.description','ref_function_deliverables.function_class')
                                                ->where('user_id' , $this->auth_user_id)
                                                ->where('program_id',$settings->select_program_id)
                                                ->paginate($this->pi_table_paginate);
            }
            // dd($res);
            return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
        }
    }

    public function getBudgetLineItem(Request $req){
        $data= [];
        $unit_id = Auth::user()->getUnitId() == null ? (UserProfile::where('user_id',$this->auth_user_id)->first())->unit_id : Auth::user()->getUnitId() ;
        $a = \App\TableUnitBudgetAllocation::join('ref_budget_line_item','ref_budget_line_item.id','tbl_unit_budget_allocation.budget_line_item_id')
                                                                    ->join('ref_year','ref_year.id','tbl_unit_budget_allocation.year_id')
                                                                    ->where('tbl_unit_budget_allocation.unit_id', $unit_id)
                                                                    ->where('tbl_unit_budget_allocation.year_id',$req->year_id)
                                                                    ->where('tbl_unit_budget_allocation.program_id',$this->auth_user_program_id)
                                                                    ->where('ref_budget_line_item.status','ACTIVE')
                                                                    ->get()
                                                                    ->toArray();

        $data['budget_allocation'] = count($a) > 0 ? $a : [];
        // dd($a);
        //  dd($this->auth_user_program_id);
        // dd($unit_id);
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
        // dd($req->all());
        // $progam_id = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
        $unit_id = Auth::user()->getUnitId() == null ? (UserProfile::where('user_id',$this->auth_user_id)->first())->unit_id : Auth::user()->getUnitId();
        // dd($this->auth_user_program_id);
        $vw_allocation = BudgetAllocationAllYearPerProgram::where('t1_unit_id',$unit_id)
                                                        ->where('t1_year_id',$req->year_id)
                                                        ->where('budget_line_item_id',$req->bli_id)
                                                        ->where('t1_program_id',$this->auth_user_program_id)
                                                        ->first();

        // $result = $a->getSingleBudgetAllocationUtilization(,$req->year_id,$req->bli_id);
        // dd($vw_allocation);
        return $vw_allocation;
    }

    public function getWfpByCode(Request $req)
    {
        if($req->ajax()){

            $data["activities"] = WfpActivityInfo::where('code',$req->wfp_code)->get();

            $year_id = GlobalSystemSettings::where('user_id',$this->auth_user_id)->first();
            $year_id = $year_id->select_year;
            $year = RefYear::where('id',$year_id)->first();
            // $status = ZWfpLogs::where('wfp_code',$req->wfp_code)->orderBy('created_at','DESC')->first();

            // if($status["status"] =='WFP' ){
            //     if($status["remarks"] =='SUBMITTED')
            //     {
            //         $cmd["EDIT"] = 0;
            //         $cmd["DEL"] = 0;
            //         $cmd["VIEW"] = 0;
            //         $cmd["PPMP"] = 0;
            //         $cmd["COMMENT"] = 1;
            //     }else if($status["remarks"] == 'APPROVED'){
            //         $cmd["EDIT"] = 0;
            //         $cmd["DEL"] = 0;
            //         $cmd["VIEW"] = 0;
            //         $cmd["PPMP"] = 1;
            //         $cmd["COMMENT"] = 0;
            //     }else if ($status["remarks"] == 'FOR REVISION'){
            //         $cmd["EDIT"] = 1;
            //         $cmd["DEL"] = 1;
            //         $cmd["VIEW"] = 1;
            //         $cmd["PPMP"] = 0;
            //         $cmd["COMMENT"] = 0;
            //     }else if($status["remarks"] == 'NOT SUBMITTED'){
            //         $cmd["EDIT"] = 1;
            //         $cmd["DEL"] = 1;
            //         $cmd["VIEW"] = 1;
            //         $cmd["PPMP"] = 0;
            //         $cmd["COMMENT"] = 0;
            //     }
            // }

            $data["comments"] = WfpComments::where('wfp_code',$req->wfp_code)->groupBy('wfp_act_id')
                                           ->get();

            return view('components.global.wfp_drawer',['data'=>$data,
                                                        'year' => $year->year ,
                                                        'user_id'=> (count($data["activities"]) <> 0 ? $data["activities"][0]["user_id"] : null),
                                                        'wfp_code'=> ($req->wfp_code != null ? Crypt::encryptString($req->wfp_code) : null)
                                                        ]);
        }
    }

    public function generateWfpCode(Request $req){
        $user_id = Auth::user()->id;
        $unit_id = Auth::user()->getUnitId() == null ? (UserProfile::where('user_id',$user_id)->first())->unit_id : Auth::user()->getUnitId() ;
        $year_id = $req->year_id;
        $program_id = (GlobalSystemSettings::where('user_id',$user_id)->first())->select_program_id;

        if($program_id <= 0 ){
            return ['message'=>'only program coordinator can generate wfp or you may update your settings'];
        }

        /* this for single wfp per year per program
        $wfp_check_exist = Wfp::where('program_id',$program_id)->where('year_id',$year_id) ->first();

        if($wfp_check_exist){
            return ['message'=>'You only have already created wfp this year'];
        }
        */
        $code = DB::select('CALL generate_wfp_code(?,?,?,?)' , array($user_id,$unit_id,$year_id,$program_id));
        $code = $code[0]->wfp_code;
        // $check = Wfp::where('user_id',$user_id)
        //             ->where('unit_id',$unit_id)
        //             ->where('year_id',$year_id)
        //             ->where('program_id',$program_id)
        //             ->get()->toArray();
        $unitHasBadget = TableUnitBudgetAllocation::where('unit_id',$unit_id)->where('year_id',$year_id)->first();
        // if(count($check) >= 2){
        //     return ['message'=>'duplicate'];
        // }

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
            $wfp->program_id = $program_id;
            $stat = $wfp->save();

            // $wfp_act = new WfpActivity;
            // $wfp_act->wfp_code = $code;
            // $wfp_act->encoded_by =  $this->auth_user_id;
            // $wfp_act->save();

            // $wfp_act_indi = new WfpPerformanceIndicator;
            // $wfp_act_indi->wfp_code = $code;
            // $wfp_act_indi->save();

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

        if($req->ajax()){
            // dd($req->all());
            $sum_used_budget_bli  =0;
            $other_act_pi_cost = WfpPerformanceIndicator::where('wfp_act_id',$req->id)
                                                        // ->where('bli_id',$req->bli_id)
                                                        ->get();

            $wfp_act = WfpActivity::where('id',$req->id)->first();

            if(count($other_act_pi_cost) != 0){
                foreach ($other_act_pi_cost as $r){
                    $sum_used_budget_bli += $r["cost"];
                }
            }

            if($wfp_act->activity_cost == null){
                return 'save activity first';
            }
            // dd($sum_used_budget_bli);
            // dd($wfp_act->activity_cost);
            // dd(( $sum_used_budget_bli + $req->data["cost"]));
            //if requested cost is  greater than the activity plan cost
            if(( $sum_used_budget_bli + $req->data["cost"])  > ($wfp_act->activity_cost - 0 )){
                return 'exceeds act budget';
            }
            // $progam_id = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
            //budgetline budget not exceeding
            $program_budget = BudgetAllocationUtilization::where('budget_line_item_id',$req->bli_id)
                                                        ->where('program_id',$this->auth_user_program_id)
                                                        ->first();


            if($req->data["cost"] > $program_budget->utilized_pi_balance){
                return 'exceeds bli budget';
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
            $wfp_indicator->batch = $req->data["batches"] != '' ? $req->data["batches"] : '';
            $wfp_pi = $wfp_indicator->save();
            if($req->data["catering_include"] == 'true')
            {
                $b_no = $req->data["batches"] - 0;
                for($i=1; $i <= $b_no; $i++){
                    $wfp_batch = new TablePiCateringBatches;
                    $wfp_batch->pi_id = $wfp_indicator->id;
                    $wfp_batch->batch_no = $i;
                    $wfp_batch->save();
                }
            }
            return   $wfp_pi ? 'success' : 'failed';
        }
    }

    public function getAllUnitsWfpList(Request $req){
        $data = [];
        $user_id  = $this->auth_user_id;
        $settings = GlobalSystemSettings::where('user_id',$user_id)->first();
        $user_role = (Auth::user()->role)->roles;
        if($settings){
            // dd($user_id);
            if($req->q != null){
                if($user_role != "PROGRAM COORDINATOR"){

                    $qry = $req->q;
                    $data["wfp_list"] = WfpListByProgram::where('year_id',$settings->select_year)
                                        ->where('wfp_code','!=',null)
                                        ->where(fn($q) =>
                                            $q->where('name','LIKE', '%' . $qry .'%')
                                            ->orWhere('division','LIKE','%' . $qry .'%')
                                            ->orWhere('section','LIKE','%' . $qry .'%')
                                            ->orWhere('program_name','LIKE','%' . $qry .'%')
                                            ->orWhere('wfp_code',$qry)
                                        )
                                        ->groupBy(['wfp_code'])
                                        ->paginate($this->wfp_list_paginate);
                }else{
                    $qry = $req->q;
                    $data["wfp_list"] = WfpListByProgram::where('year_id',$settings->select_year)
                                        ->where('wfp_code','!=',null)
                                        ->where('program_id',$settings->select_program_id)
                                        ->where(fn($q) =>
                                            $q->where('name','LIKE', '%' . $qry .'%')
                                            ->orWhere('division','LIKE','%' . $qry .'%')
                                            ->orWhere('section','LIKE','%' . $qry .'%')
                                            ->orWhere('program_name','LIKE','%' . $qry .'%')
                                            ->orWhere('wfp_code',$qry))
                                        ->groupBy(['wfp_code'])
                                        ->paginate($this->wfp_list_paginate);
                }

            }else{
                if($user_role != "PROGRAM COORDINATOR"){
                    $data["wfp_list"] = WfpListByProgram::where('year_id',$settings->select_year)
                                        ->where('wfp_code','!=',null)
                                        ->groupBy(['wfp_code'])
                                        ->paginate($this->wfp_list_paginate);

                }else{
                    $data["wfp_list"] = WfpListByProgram::where('year_id',$settings->select_year)
                                        ->where('wfp_code','!=',null)
                                        ->where('program_id',$settings->select_program_id)
                                        ->groupBy(['wfp_code'])
                                        ->paginate($this->wfp_list_paginate);
                }

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
            $code =Crypt::decryptString($req->wfp_code);
            $wfp = Wfp::where('code',$code)->first();

            $a = new WfpComments;
            $a->wfp_code = $code;
            $a->user_id = $req->user_id;
            $a->comment = $req->comment;
            $a->user_from = Auth::user()->id;
            $a->wfp_act_id = $req->twa_id;
            if( $a->save())
            {
                broadcast(new NotifyUserWfpStatus($wfp,'Comment',$req->twa_id,'WFP Comment'))->toOthers();
                return 'success';
            }else{
                return 'failed';
            }
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
        $total_balance_act_plan = 0;
        $budget_allocation = WfpListByProgram::where('wfp_code', $wfp_code )->first();

        if($budget_allocation){
            $total_balance_act_plan = ($budget_allocation->yearly_budget - $budget_allocation->yearly_utilized);
        }

        if( $total_balance_act_plan < $req->data["act_cost"])
        {
            return ['message'=> 'not enough budget'];
        }

        // CONAP CHECKER HAS BUDGET IF CONAP SELECTED
        $source = RefSourceOfFund::where('id',$req->data["source_of_fund"])->first();
        $conap  = ProgramConap::where('program_id',ltrim(substr($wfp_code,9,3),'0'))
                                ->where('year_id',ltrim(substr($wfp_code,6,3),'0'))->first();
        if($source->sof_classification == "CONAP"){
            if(!$conap){
                return ['message'=>'You dont have CONAP budget Allocated for this year','id'=> null];
            }
        }

        if($req->id > 0){
            //update
            $wfp_act = WfpActivity::where('id',$req->id)->first();
            $wfp_act->wfp_code = $wfp_code;
            $wfp_act->out_function =$req->data["output_function"];
            $wfp_act->out_activity =$req->data["activity_output"];
            $wfp_act->activity_category_id =$req->data["activity_categ"];
            $wfp_act->activity_gad_related =$req->data["gad_related"];
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
        }else{
            //insert
            $wfp_act = new WfpActivity;
            $wfp_act->wfp_code = $wfp_code;
            $wfp_act->out_function =$req->data["output_function"];
            $wfp_act->out_activity =$req->data["activity_output"];
            $wfp_act->activity_category_id =$req->data["activity_categ"];
            $wfp_act->activity_gad_related =$req->data["gad_related"];
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
        }
        // dd(Crypt::decryptString($req->wfp_code));

        return ['message'=>'success','id'=> $wfp_act->id];

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
            $code = Crypt::decryptString($req->pi["wfp_code"]);
            $bli_id =$req->bli_id;
            $pi_id = WfpPerformanceIndicator::where('id',$req->id)->first();
            $act_id = $pi_id->wfp_act_id;
            $sum_used_budget_bli  =0;
            $other_act_pi_cost = WfpPerformanceIndicator::where('id','!=',$req->id)
                                                        ->where('wfp_act_id',$act_id)
                                                        ->where('bli_id',$req->bli_id)
                                                        ->get();
            $wfp_act = WfpActivity::where('id',$act_id)->first();

            if(count($other_act_pi_cost) <> 0){
                foreach ($other_act_pi_cost as $r){
                    $sum_used_budget_bli += $r["cost"];
                }
            }
            // dd( $other_act_pi_cost);

            //if requested cost is  greater than the activity plan cost
            if(( $sum_used_budget_bli + $req->pi["cost"])  > $wfp_act->activity_cost){
                return 'exceeds budget';
            }
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
                $wfp_indicator->batch = $req->pi["batches"] != '' ? $req->pi["batches"] : '';
                $wfp_pi = $wfp_indicator->save();
                if($req->pi["catering_include"] == 'true')
                {
                    $delete_existing = TablePiCateringBatches::where('pi_id',$req->id)->delete();
                    if($delete_existing){
                        $b_no = $req->pi["batches"] - 0;
                        for($i=1; $i <= $b_no; $i++){
                            $wfp_batch = new TablePiCateringBatches;
                            $wfp_batch->pi_id = $req->id;
                            $wfp_batch->batch_no = $i;
                            $wfp_batch->save();
                        }
                    }
                }
                return  $wfp_pi ? 'success' : 'failed';
            }else{
                return 'no budget';
            }

        }else{
            abort(403);
        }
    }

    public function updateWfpActivity(Request $req){
        if($req->ajax()){

            $total_act = 0;
            $total_pi_cost = 0;
            $wfp_code = Crypt::decryptString($req->wfp_act["wfp_code"]);
            $budget_allocation_program = BudgetAllocationUtilization::where('year_id', $this->year_id )
                                                                    ->where('program_id', $this->auth_user_program_id)->first();
            $budget_allocation_program["yearly_budget"];
            $check_has_pi = WfpPerformanceIndicator::where('wfp_code',$wfp_code)->where('wfp_act_id',$req->wfp_act_id)->get()->toArray();

            if(count($check_has_pi) != 0){
                foreach($check_has_pi as $r){
                    $total_pi_cost += $r["cost"];
                }
            }

            $wfp_act = WfpActivity::where('wfp_code',$wfp_code)->where('id','!=',$req->wfp_act_id)->get()->toArray();

            if(count($wfp_act) != 0){
                foreach($wfp_act as $r){
                    $total_act += $r["activity_cost"];
                }
            }

            // dd($total_act);
            // dd($budget_allocation_program["yearly_budget"]);
            $maximum_cost_request = $budget_allocation_program["yearly_budget"] - $total_act;
            // dd($budget_allocation_program["yearly_budget"] - $total_act);
            // dd($req->wfp_act["act_cost"]);

            //validation budget activity
            if( $maximum_cost_request < $req->wfp_act["act_cost"])
            {
               return 'not enough budget';
           }
            // dd($total_pi_cost);
            // dd($req->wfp_act["act_cost"]);
                //validation budget performance indicator
            if(($req->wfp_act["act_cost"] - 0) < $total_pi_cost){
                return 'the new amount is not enough for the existing Performance Indicator costing';
            }

            // dd($req->wfp_act);
            $a = WfpActivity::where('id',$req->wfp_act_id)->first();
            $a->out_function =$req->wfp_act["output_function"];
            $a->out_activity =$req->wfp_act["activity_output"];
            $a->activity_gad_related =$req->wfp_act["gad_related"];
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
                                            ->where('wfp_code',$code)
                                            ->where('wfp_act_id',$req->wfp_act_id)
                                            ->get()->toArray();
            // dd($data);
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
        $wfp = Wfp::where('code',Crypt::decryptString($req->wfp_code))->first();
        $program = RefProgram::where('id',$wfp->program_id)->first();
        event(new NotifyUserWfpStatus($wfp,'WFP Approve', '<b>'  . $program->program_name . ' Program</b>' . ' Wfp has been approved','WFP Update'));
        // dd($wfp->user_id);
        $u = new User;
        $sms = new ApiSMS;
        $sms->sendSMS($u->getUserContact($wfp->user_id),'WFP Approve ' . $program->program_name . ' Program ' . ' Wfp has been approved on ');
        // return $data;
    }


    public function updateWfpSubmit(Request $req){
        // $a = ZWfpLogs::where('code',Crypt::decryptString($req->wfp_code))->first();
        $a = new ZWfpLogs;
        $a->wfp_code = Crypt::decryptString($req->wfp_code);
        $a->status = 'WFP';
        $a->remarks = 'SUBMITTED';
        $a->save();
        $wfp = Wfp::where('code',Crypt::decryptString($req->wfp_code))->first();
        $program = RefProgram::where('id',$wfp->program_id)->first();

        broadcast(new NotifyUserWfpStatus($wfp,'WFP Submit', '<b>'  . $program->program_name . ' Program</b>' . ' Wfp has been submitted','WFP Update'))->toOthers();
        $u = new User;
        $sms = new ApiSMS;
        $sms->sendSMS($u->getUserContact($wfp->user_id),'WFP Submitted ' . $program->program_name . ' Program ' . ' Wfp has been Submitted');
    }

    public function updateWfpRevise(Request $req){
        // $a = ZWfpLogs::where('code',Crypt::decryptString($req->wfp_code))->first();
        $a = new ZWfpLogs;
        $a->wfp_code = Crypt::decryptString($req->wfp_code);
        $a->status = 'WFP';
        $a->remarks = 'FOR REVISION';
        $a->save();
        $wfp = Wfp::where('code',Crypt::decryptString($req->wfp_code))->first();
        $program = RefProgram::where('id',$wfp->program_id)->first();
        event(new NotifyUserWfpStatus($wfp,'WFP Revise', '<b>'  . $program->program_name . ' Program</b>' . ' Wfp needs to be revised','WFP Update'));
        $u = new User;
        $sms = new ApiSMS;
        $sms->sendSMS($u->getUserContact($wfp->user_id),'WFP Revised ' . $program->program_name . ' Program ' . ' Wfp has been Revised');
    }

    public function newWfpActivity(Request $req){
        $wfp_code = Crypt::decryptString($req->wfp_code);
        $total_balance_act_plan = 0;
        $budget_allocation = WfpListByProgram::where('wfp_code', $wfp_code )->first();

        if($budget_allocation){
            $total_balance_act_plan = ($budget_allocation->yearly_budget - $budget_allocation->yearly_utilized);
        }
        if( $total_balance_act_plan <= 0)
        {
            return ['message'=> 'No budget'];
        }else if ( $total_balance_act_plan < 1000){
            return ['message'=> 'less1000'];
        }

        if($req->insert == '1'){
            $a = new WfpActivity;
            $a->wfp_code = Crypt::decryptString($req->wfp_code);
            $a->encoded_by = Auth::user()->id;
            $a->save();
        }


        $data = [];
        $code = Crypt::decryptString($req->wfp_code);
        $categ = new RefActivityCategory;
        $sof = new RefSourceOfFund;
        $data["activity_category"] = $categ->getAll();
        $data["sof"] = $sof->getAll();
        $data["wfp"] = Wfp::where('code',$code)->first();

        // dd($req->wfp_id);
        if($req->wfp_id != null){
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

        if($req->insert == '1'){
        $data["wfp_act_indi"] = WfpPerformanceIndicator::where('wfp_act_id',$a->id)->get();
        $data["pi_data"] =  WfpPerformanceIndicator::where('wfp_act_id',$a->id)->get()->toArray();
        return view('pages.transaction.wfp.create_wfp_new_activity',['data' => $data,'wfp_act_id'=>$a->id]);
        }
    }

    public function deleteUnitAcitivityById(Request $req){
        if($req->ajax()){
            $found = WfpActivity::where('id',$req->wfp_act_id)->first();
            if($found){
                $pi_delete = WfpPerformanceIndicator::where('wfp_act_id',$req->wfp_act_id)->delete();
                $wfp_act_delete = WfpActivity::where('id',$req->wfp_act_id)->delete();
                return  $wfp_act_delete ? ['message'=>'success','code'=>$found->wfp_code] : ['message'=>'failed'];
            }
        }else{
            abort(403);
        }
    }
}
