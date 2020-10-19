<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
class PpmpController extends Controller
{
    //
    public function index(Request $req){
        $data=[];
        $data["wfp_code"] = Crypt::decryptString($req->wfp_code);
        $data["wfp_act_id"] = $req->wfp_act_id;
// dd($data);
        return view('pages.transaction.ppmp.ppmp',['data' => $data]);
    }

    public function getCartDetailsByWfpActivity(Request $req){
        // dd($req->all());
        $data =[];

        return view('components.global.wfp_activity_cart_drawer',['data' => $data]);
    }
}
