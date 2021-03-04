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
use App\ProgramConap;
use App\TableUnitProgram;
use App\RefSourceOfFund;
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

    public function getAllBLI(Request $req){
        if($req->ajax()){
            $res = RefBudgetLineItem::join('ref_source_of_fund','ref_source_of_fund.id','ref_budget_line_item.fund_source_id')
                                    ->where('year_id',$req->year)
                                    ->where('ref_source_of_fund.sof_classification','GAA')
                                    ->select('ref_budget_line_item.id','ref_budget_line_item.budget_item')
                                    ->get()->toArray();
            return view('pages.transaction.budget_allocation.component.select_bli',['data'=>$res]);
        }else{
            abort(403);
        }
    }

    public function getBudgetAllocationUtilization(Request $req){
        $data =[];
        $settings = new GlobalSystemSettings;
        // dd($req->year - 0);
        //  dd(BudgetAllocationAllYearPerProgram::all());

        if($req->q == null || $req->q == ''){
            $data["unit_budget_allocation"] = BudgetAllocationAllYearPerProgram::groupBy('t1_unit_id','t1_year_id','t1_program_id')
                                                                                ->where('t1_year_id',$req->year - 0)
                                                                                ->orderBy($req->sort != '' ? $req->sort : 't1_year_id' )
                                                                                ->paginate($this->budget_allocation_pagination);
        }else{
            $data["unit_budget_allocation"] = BudgetAllocationAllYearPerProgram::groupBy('t1_unit_id','t1_year_id','t1_program_id')
                                                                                ->where('t1_year_id',$req->year - 0)
                                                                                ->where(fn($q) =>
                                                                                $q->orWhere('t1_division','LIKE','%' . $req->q . '%')
                                                                                  ->orWhere('t1_section','LIKE','%' . $req->q . '%')
                                                                                  ->orWhere('t1_name','LIKE','%' . $req->q . '%')
                                                                                  ->orWhere('t1_program_name','LIKE','%' . $req->q . '%')
                                                                                  )
                                                                                ->orderBy($req->sort != '' ? $req->sort : 't1_year_id' )
                                                                                ->paginate($this->budget_allocation_pagination);

        }
        // dd($data);
        return view('pages.transaction.budget_allocation.component.table_unit_budget_allocation',['data'=>$data]);
    }

    public function getBudgetAllocationPerBLIByUser(Request $req){
        $data = [];

        // dd($req->all());
        $data["unit_per_user_budget"] = BudgetAllocationUtilization::where('user_id',$req->user_id)
                                                                    ->where('unit_id',$req->unit_id)
                                                                    ->where('year_id',$req->year_id)
                                                                    ->where('program_id',$req->program_id)
                                                                    // ->groupBy('user_id','unit_id','year_id','program_id')
                                                                    ->get()->toArray();
        // dd($data);
        return view('pages.transaction.budget_allocation.component.table_unit_bli_allocation',['data'=>$data]);
    }

    public function saveBudgetAllocationUnit(Request $req){
        if($req->ajax()){
            $check = TableUnitBudgetAllocation::where('budget_line_item_id',$req->budget_line_item_id)
                                                ->where('unit_id',$req->unit_id)
                                                ->where('year_id',$req->year_id)
                                                ->where('program_id',$req->program_id)
                                                ->first();
            //check for duplicates on budget line item
            if($check){
                return 'duplicate';
            }else{
                $budget = new TableUnitBudgetAllocation;
                $budget->program_id = $req->program_id;
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
            // dd($req->all());
            $edit_data = TableUnitBudgetAllocation::where('budget_line_item_id',$req->r_bli_id)
                                                ->where('unit_id',$req->r_unit_id)
                                                ->where('year_id',$req->r_year_id)
                                                ->where('program_id',$req->r_program_id)
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
                                                            ->where('program_id',$req->program_id)
                                                            ->delete();
            if($del_allocation_all)                                            {
                return 'success';
            }else{
                abort(403);
            }
        }
    }

    public function getAmountByBliYear(Request $req){
        if($req->ajax()){
            $data=[];
            $data["bli"] = RefBudgetLineItem::where('budget_item',$req->bli)->where('year_id',$req->year)->get()->toArray();
            $data["allocated"] = TableUnitBudgetAllocation::where('budget_line_item_id',$req->bli_id)->get()->toArray();
            $data["calc"]= [] ;
            $total_allocated =0;
            if(count($data["allocated"]) != 0){
                foreach($data["allocated"] as $row){
                    $total_allocated += $row["program_budget"];
                }
            }


            // //edit
            $hold_edit_value = 0;
            if($req->has('unit_id')){
                $a = TableUnitBudgetAllocation::where('budget_line_item_id',$req->bli_id)
                                            ->where('unit_id',$req->unit_id)
                                            ->first();
                $hold_edit_value = $a["program_budget"];
            }
            // dd($hold_edit_value);
            // dd($a["program_budget"]);
            // dd($total_allocated);
            $total_allocated -= $hold_edit_value;
            $data["calc"] =[
                "total_allocated" => $total_allocated ,
                "total_year_bli_budget" => $data["bli"][0]["allocation_amount"],
                "balance_year_bli_amount" =>  $data["bli"][0]["allocation_amount"] - $total_allocated
            ];

            return $data;
        }else{
            abort(403);
        }
    }

    public function conapSave(Request $req){
        if($req->ajax()){
            $data = [];
            $bli = [];
            $bli_headers = ["bli_id","bli_name",'sof',"balance",'saa_ctrl_number','purpose'];
            $bli_data = BudgetAllocationUtilization::where('program_id',$req->program_id)
                                                ->where('year_id',$req->year_id)
                                                ->select('budget_line_item_id','budget_item','source_of_fund_classification','ppmp_actual_balance','saa_ctrl_number','purpose')
                                                ->get()->toArray();
            foreach ($bli_data as $row){
                array_push($bli,array_combine($bli_headers,$row));
            }

            $year = RefYear::where('id',$req->year_id)->first();
            $nextYear = RefYear::select('year','id')->where('year',($year->year + 1))->first();

            if($nextYear){
                $unit_id = TableUnitProgram::select('unit_id')->where('program_id',$req->program_id)->first();

                $data = [
                    'program_id' => $req->program_id,
                    'year_forwarded' =>$nextYear->id ,
                    'year_id' => $req->year_id,
                    'amount' => $req->amount,
                    'bli_distribution' => json_encode($bli)
                ];

                foreach ($bli_data as $row){

                    $sof = RefSourceOfFund::where('sof_classification',$row["source_of_fund_classification"]. '-CONAP')->first();
                    if($row["source_of_fund_classification"] == 'GAA'){
                        $data_rbli =[
                            'budget_item'=> $row["source_of_fund_classification"] . '-CONAP (' . $row["budget_item"] .')',
                            'year_id'=> $nextYear->id,
                            'unit_program_id'=> $req->program_id - 0,
                            'allocation_amount'=> $row["ppmp_actual_balance"],
                            'fund_source_id'=> $sof->id
                        ];
                    }else{
                        $data_rbli =[
                            'budget_item'=> $row["source_of_fund_classification"] . '-CONAP (' . $row["budget_item"] .')',
                            'year_id'=> $nextYear->id,
                            'unit_program_id'=> $req->program_id - 0,
                            'allocation_amount'=> $row["ppmp_actual_balance"],
                            'fund_source_id'=> $sof->id,
                            'saa_ctrl_number'=> $row["saa_ctrl_number"],
                            'purpose' => $row["purpose"]
                        ];
                    }


                    $save = RefBudgetLineItem::create($data_rbli);

                    $data_tuba = [
                        'program_id'=>  $req->program_id,
                        'unit_id'=> $unit_id->unit_id,
                        'budget_line_item_id'=> $save->id,
                        'program_budget'=> $row["ppmp_actual_balance"],
                        'year_id'=> $nextYear->id
                    ];

                    TableUnitBudgetAllocation::create($data_tuba);
                }




                $check = ProgramConap::where('program_id',$req->program_id)->where('year_id', $req->year_id)->first();

                return $check ?? ProgramConap::create($data) ? 'success': 'failed';
            }else{
                return 'Error: please add next year';
            }

        }else{
            abort(403);
        }
    }

    public function conapRollback(Request $req){
        if($req->ajax()){
            $conap = ProgramConap::where('program_id',$req->program_id)
                                ->where('year_id', $req->year_id)
                                ->where('amount',$req->amount)
                                ->first();
            return $conap->delete() ? 'success' : 'failed';
        }else{
            abort(403);
        }
    }
}
