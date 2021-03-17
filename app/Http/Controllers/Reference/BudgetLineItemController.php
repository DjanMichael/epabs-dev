<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Views\BudgetLineItem;
use App\Views\UnitProgram;
use App\TableUnitBudgetAllocation;
use App\RefBudgetLineItem;
use App\RefBudgetItem;
use App\RefSourceOfFund;
use App\RefProgram;
use App\RefUnits;
use App\RefYear;
use App\User;

class BudgetLineItemController extends Controller
{
    //
    public function index(){ return view('pages.reference.budget_line_item.budget_line_item', ['checker'=>'FUND']); }

    public function fetchBudgetLineItem(){
        $data = BudgetLineItem::where('sof_classification', '==', 'GAA')
                                ->orWhere('sof_classification', '==', 'SAA')
                                ->paginate(10);
        return $data;
    }

    public function getBudgetLineItem(){
        return view('pages.reference.budget_line_item.table.display_budget_line_item',['budgetlineitem'=> $this->fetchBudgetLineItem()]);
    }

    public function getBudgetLineItemByPage(Request $request){
        if($request->ajax())
        {
            return view('pages.reference.budget_line_item.table.display_budget_line_item',['budgetlineitem'=> $this->fetchBudgetLineItem()]);
        } else {
            abort(403);
        }
    }

    public function getBudgetLineItemSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = BudgetLineItem::where('budget_item' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('program_name', 'LIKE', '%'. $query .'%')
                                        ->orWhere('saa_ctrl_number', 'LIKE', '%'. $query .'%')
                                        ->orWhere('sof_classification', 'LIKE', '%'. $query .'%')
                                        ->orWhere('year', 'LIKE', '%'. $query .'%')
                                        ->paginate(10);
            } else {
                $data = BudgetLineItem::paginate(10);
            }
            return view('pages.reference.budget_line_item.table.display_budget_line_item',['budgetlineitem'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm(){
        $data['year'] = RefYear::where('status','ACTIVE')->orderBy('year', 'ASC')->get();
        $data['units'] = RefUnits::select('id', 'division')
                                    ->distinct()
                                    ->where('status','ACTIVE')
                                    ->groupBy('division')
                                    ->orderBy('division', 'ASC')
                                    ->get();
        $data['fund_source'] = RefSourceOfFund::where('status','ACTIVE')->orderBy('sof_classification', 'ASC')->get();
        $data['budget_item'] = RefBudgetItem::where('status','ACTIVE')
                                            ->orderBy('budget_item', 'ASC')->get();
        return view('pages.reference.budget_line_item.form.add_budget_line_item', ['data'=> $data]);
    }

    public function getSection(Request $request){
        $select = "division";
        $value = $request->get('value');
        $data = RefUnits::where($select, $value)->orderBy('section', 'ASC')->get();
        $output = '<option value="">Please select section</option>';
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->section.'</option>';
        }
        echo $output;
    }

    public function getUnitProgram(Request $request){
        $select = "unit_id";
        $value = $request->get('value');
        $data = UnitProgram::where($select, $value)->get();
        $output = '<option value="">Please select program</option>';
        foreach($data as $row){
            $output .= '<option value="'.$row->program_id.'">'.$row->program_name.'</option>';
        }
        echo $output;
    }

    public function store(Request $request) {

        if($request->ajax()) {
            if ($request->fund_source == "SAA") {
                $check = RefBudgetLineItem::find($request->id)
                        ? RefBudgetLineItem::where([
                                                ['saa_ctrl_number', $request->saa_number],
                                                ['year_id', $request->year_id],
                                                ['id', '<>', $request->id]
                                                ])->first()
                        : RefBudgetLineItem::where([
                                                ['saa_ctrl_number', $request->saa_number],
                                                ['year_id', $request->year_id],
                                                ])->first();
            } else {
                $check = RefBudgetLineItem::find($request->id)
                        ? RefBudgetLineItem::where([
                                                ['fund_source_id', $request->fund_source_id],
                                                ['budget_item', $request->budget_item],
                                                ['year_id', $request->year_id],
                                                ['id', '<>', $request->id]
                                                ])->first()
                        : RefBudgetLineItem::where([
                                                ['fund_source_id', $request->fund_source_id],
                                                ['budget_item', $request->budget_item],
                                                ['year_id', $request->year_id],
                                                ])->first();
            }
            
            if ($check) {
                if ($request->fund_source == "SAA") {
                    return response()->json(['message'=>$request->saa_number.' already have amount for year '.$request->year, 'type'=> 'info']);
                } else {
                    return response()->json(['message'=>'Fund source '.$request->fund_source.', Budget Item '.$request->budget_item.' already have amount for year '.$request->year, 'type'=> 'info']);
                }
            } else {
                $check = RefBudgetLineItem::find($request->id);
                if ($check) {
                    if ($request->fund_source == "SAA") { 
                        $check->update([
                            'fund_source_id' => $request->fund_source_id,
                            'budget_item' => $request->budget_item,
                            'unit_id' => $request->unit_id,
                            'program_id' => $request->program,
                            'year_id' => $request->year_id,
                            'allocation_amount' => $request->amount,
                            'saa_ctrl_number' => $request->saa_number,
                            'purpose' => $request->purpose,
                            'status' => $request->status]);

                        TableUnitBudgetAllocation::where('budget_line_item_id', '=', $request->id)
                                                ->update([                            
                                                    'program_id' => $request->program,
                                                    'unit_id' => $request->unit_id,
                                                    'program_budget' => $request->amount,
                                                    'year_id' => $request->year_id]);
                    } else { 
                        $check->update([
                            'fund_source_id' => $request->fund_source_id,
                            'budget_item' => $request->budget_item,
                            'year_id' => $request->year_id,
                            'allocation_amount' => $request->amount,
                            'status' => $request->status]);
                    }

                    return response()->json(['message'=>'Successfully updated data','type'=>'update']);
                }
                else if (empty($check)) {
                    $budget_item = [
                        'fund_source_id' => $request->fund_source_id,
                        'budget_item' => $request->budget_item,
                        'unit_id' => $request->unit_id,
                        'program_id' => $request->program,
                        'year_id' => $request->year_id,
                        'allocation_amount' => $request->amount,
                        'saa_ctrl_number' => $request->saa_number == 'None' ? '' : $request->saa_number,
                        'purpose' => $request->purpose == 'None' ? '' : $request->purpose,
                        'status' => $request->status
                    ];
                    
                    $budget_id = RefBudgetLineItem::create($budget_item)->id;

                    if ($request->fund_source == "SAA") { 
                        $unit_budget_allocation = [
                            'program_id' => $request->program,
                            'unit_id' => $request->unit_id,
                            'budget_line_item_id' => $budget_id,
                            'program_budget' => $request->amount,
                            'year_id' => $request->year_id
                        ];
                        TableUnitBudgetAllocation::create($unit_budget_allocation);
                    }

                    return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
                }
                else {
                    return response()->json(['message'=>'Something went wrong']);
                }
            }
        } else {
            abort(403);
        }

    }

}
