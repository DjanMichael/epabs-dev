<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\RefActivityOutputFunctions;

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

    public function getOutputFunctions()
    {
        $res = RefActivityOutputFunctions::where('user_id' , Auth::user()->id)->get();
        return view('pages.transaction.wfp.table.output_functions',['output_functions'=> $res]);
    }
}
