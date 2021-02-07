<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Views\BudgetLineItem;
use App\RefBudgetLineItem;
use App\RefSourceOfFund;
use App\RefProgram;
use App\RefYear;

class BudgetLineItemController extends Controller
{
    //
    public function index(){ return view('pages.reference.budget_line_item.budget_line_item'); }

    public function fetchBudgetLineItem(){
        $data = BudgetLineItem::paginate(10);
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
                $data = RefBudgetLineItem::leftJoin('ref_year', 'ref_year.id', '=', 'ref_budget_line_item.year_id')
                                        ->select('ref_budget_line_item.id', 'budget_item', 'year', 'allocation_amount', 'ref_budget_line_item.status')
                                        ->where('budget_item' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('year', 'LIKE', '%'. $query .'%')
                                        ->paginate(10);
            } else {
                $data = $this->fetchBudgetLineItem();
            }
            return view('pages.reference.budget_line_item.table.display_budget_line_item',['budgetlineitem'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm(){
        $data['year'] = RefYear::where('status','ACTIVE')->orderBy('year', 'ASC')->get();
        $data['program'] = RefProgram::where('status','ACTIVE')->orderBy('program_name', 'ASC')->get();
        $data['fund_source'] = RefSourceOfFund::where('status','ACTIVE')->orderBy('sof_classification', 'ASC')->get();
        $data['budget_item'] = RefBudgetLineItem::select('budget_item')
                                                ->where('budget_item','<>', 'None')->distinct()
                                                ->where('status','ACTIVE')
                                                ->orderBy('budget_item', 'ASC')->get();
        return view('pages.reference.budget_line_item.form.add_budget_line_item', ['data'=> $data]);
    }

    public function store(Request $request) {

        if($request->ajax()) {
            $check = RefBudgetLineItem::find($request->id)
                        ? RefBudgetLineItem::where([
                                                ['budget_item', $request->budget_item],
                                                ['year_id', $request->year_id],
                                                ['id', '<>', $request->id]
                                                ])->first()
                        : RefBudgetLineItem::where([
                                                ['budget_item', $request->budget_item],
                                                ['year_id', $request->year_id],
                                                ])->first();

            if ($check) {
                return response()->json(['message'=>'Budget Item '.$request->budget_item.' already have amount for year '.$request->year, 'type'=> 'info']);
            } else {
                $check = RefBudgetLineItem::find($request->id);
                if ($check) {
                    $check->update(['budget_item' => $request->budget_item,
                                    'year_id' => $request->year_id,
                                    'allocation_amount' => $request->amount,
                                    'status' => $request->status]);
                    return response()->json(['message'=>'Successfully updated data','type'=>'update']);
                }
                else if (empty($check)) {
                    $budget_item = [
                        'fund_source_id' => $request->fund_source,
                        'budget_item' => $request->budget_item,
                        'year_id' => $request->year_id,
                        'allocation_amount' => $request->amount,
                        'saa_ctrl_number' => $request->saa_number,
                        'purpose' => $request->purpose,
                        'status' => $request->status
                    ];
                    RefBudgetLineItem::create($budget_item);
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
