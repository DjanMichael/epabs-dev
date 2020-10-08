<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefBudgetLineItem;

class BudgetLineItemController extends Controller
{
    //
    public function index(){ return view('pages.reference.budgetlineitem.budget_line_item'); }

    public function getBudgetLineItem()
    {
        $data = RefBudgetLineItem::paginate(10);
        return view('pages.reference.budgetlineitem.table.display_budget_line_item',['budgetlineitem'=> $data]);
    }

    public function getBudgetLineItemByPage(Request $request){
        if($request->ajax())
        {
            $data = RefBudgetLineItem::paginate(10);
            return view('pages.reference.budgetlineitem.table.display_budget_line_item',['budgetlineitem'=> $data]);
        }
    }

    public function getBudgetLineItemSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefBudgetLineItem::where('budget_item' ,'LIKE', '%'. $query .'%')->paginate(10);
            }else{
                $data = RefBudgetLineItem::paginate(10);
            }
            return view('pages.reference.budgetlineitem.table.display_budget_line_item',['budgetlineitem'=> $data]);
        }
    }

    public function getAddForm(){
        return view('pages.reference.budgetlineitem.form.add_budget_line_item');
    }

    public function store(Request $request) {

        $check = RefBudgetLineItem::find($request->id)
                        ? RefBudgetLineItem::where('budget_item', $request->budget_item)->where('id', '<>', $request->id)->first()
                        : RefBudgetLineItem::where('budget_item', $request->budget_item)->first();

        if ($check) {
            return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
        } else {
            $check = RefBudgetLineItem::find($request->id);
            if ($check) {
                $check->update(['budget_item' => $request->budget_item, 'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                RefBudgetLineItem::create($request->all());
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Something went wrong']);
            }
        }

    }

}
