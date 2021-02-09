<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefBudgetItem;

class BudgetItemController extends Controller
{
    //
    public function index(){ return view('pages.reference.budget_item.budget_item'); }


    public function getBudgetItem(){
        $data = RefBudgetItem::paginate(10);
        return view('pages.reference.budget_item.table.display_budget_item',['budgetitem'=> $data]);
    }

    public function getBudgetItemByPage(Request $request){
        if($request->ajax())
        {
            $data = RefBudgetItem::paginate(10);
            return view('pages.reference.budget_item.table.display_budget_item',['budgetitem'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getBudgetItemSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefBudgetItem::where('budget_item' ,'LIKE', '%'. $query .'%')
                                        ->paginate(10);
            } else {
                $data = RefBudgetItem::paginate(10);
            }
            return view('pages.reference.budget_item.table.display_budget_item',['budgetitem'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm(){
        $data['budget_item'] = RefBudgetItem::where('status','ACTIVE')
                                            ->orderBy('budget_item', 'ASC')->get();
        return view('pages.reference.budget_item.form.add_budget_item', ['data'=> $data]);
    }

    public function store(Request $request) {

        if($request->ajax()) {
            $check = RefBudgetItem::find($request->id)
                        ? RefBudgetItem::where([
                                                ['budget_item', $request->budget_item],
                                                ['id', '<>', $request->id]
                                                ])->first()
                        : RefBudgetItem::where([
                                                ['budget_item', $request->budget_item],
                                                ])->first();

            if ($check) {
                return response()->json(['message'=>'Budget Item '.$request->budget_item.' already exist!', 'type'=> 'info']);
            } else {
                $check = RefBudgetItem::find($request->id);
                if ($check) {
                    $check->update(['budget_item' => $request->budget_item,
                                    'status' => $request->status]);
                    return response()->json(['message'=>'Successfully updated data','type'=>'update']);
                }
                else if (empty($check)) {
                    $budget_item = [
                        'budget_item'   => $request->budget_item,
                        'status'        => $request->status
                    ];
                    RefBudgetItem::create($budget_item);
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
