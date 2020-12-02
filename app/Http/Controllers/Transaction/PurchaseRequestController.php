<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    //
    public function index(){
        return view('pages.transaction.pr.pr');
    }

    public function redirectCreatePurchaseRequest(){
        return view('pages.transaction.pr.pr_create');
    }
}
