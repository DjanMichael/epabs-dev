<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Views\AnnualBudget;
use App\TableAnnualBudget;
use App\RefYear;

class AnnualBudgetController extends Controller
{
    //
    public function index(){ return view('pages.reference.annual_budget.annual_budget'); }

    public function getAnnualBudget(){
        $data = AnnualBudget::paginate(10);
        return view('pages.reference.annual_budget.table.display_annual_budget',['annualbudget'=> $data]);
    }

    public function getAnnualBudgetByPage(Request $request){
        if($request->ajax())
        {
            $data = AnnualBudget::paginate(10);
            return view('pages.reference.annual_budget.table.display_annual_budget',['annualbudget'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAnnualBudgetSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = AnnualBudget::where('year' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('availbale_budget', 'LIKE', '%'. $query .'%')
                                        ->paginate(10);
            } else {
                $data = AnnualBudget::paginate(10);
            }
            return view('pages.reference.annual_budget.table.display_annual_budget',['annualbudget'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm(){
        $data['year'] = RefYear::where('status','ACTIVE')->orderBy('year', 'ASC')->get();
        return view('pages.reference.annual_budget.form.add_annual_budget', ['data'=> $data]);
    }

    public function store(Request $request) {

        if($request->ajax()) {
            $check = AnnualBudget::find($request->id)
                        ? AnnualBudget::where([
                                            ['year_id', $request->year_id],
                                            ['id', '<>', $request->id]
                                            ])->first()
                        : AnnualBudget::where([
                                            ['year_id', $request->year_id],
                                            ])->first();

            if ($check) {
                return response()->json(['message'=>'Annual Budget '.$request->budget_item.' already have amount for year '.$request->year, 'type'=> 'info']);
            } else {
                $check = TableAnnualBudget::find($request->id);
                if ($check) {
                    $check->update(['year_id' => $request->year_id,
                                    'available_budget' => $request->amount]);
                    return response()->json(['message'=>'Successfully updated data','type'=>'update']);
                }
                else if (empty($check)) {
                    $budget_item = [
                        'year_id' => $request->year_id,
                        'available_budget' => $request->amount
                    ];
                    TableAnnualBudget::create($budget_item);
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
