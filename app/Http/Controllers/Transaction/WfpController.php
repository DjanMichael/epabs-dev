<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WfpController extends Controller
{
    //
    public function index()
    {
        return view('pages.transaction.wfp.wfp');
    }

    public function goToCreateWfp(){
        return view('pages.transaction.wfp.create_wfp');
    }

    public function goToDetailsWfp()
    {
        return view('pages.transaction.wfp.wfp_details');
    }
}
