<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnualBudgetController extends Controller
{
    //
    public function index(){
        return view('pages.reference.annual_budget.annual_budget');
    }
}
