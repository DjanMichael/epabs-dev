<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefBudgetLineItem;
use App\UserProfile;
use App\RefUnits;
use App\Views\BudgetAllocationUtilization;
use Auth;
class BudgetAllocationController extends Controller
{
    //
    public function index(){
        $data["unit_budget_allocation"] = BudgetAllocationUtilization::all()->toArray();



        dd($data);

        return view('pages.transaction.budget_allocation.budget_allocation',['data'=>$data]);
    }

    public function getAllBLI(){
        $res = RefBudgetLineItem::all();
        return view('pages.transaction.budget_allocation.component.select_bli',['data'=>$res]);
    }
}
