<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AopController extends Controller
{
    //
    public function index(){
        return view('pages.transaction.aop.aop');
    }

    public function getAopList(Request $req){
        if($req->ajax()){
            $data["aop_list"] = [];

            return view('pages.transaction.aop.component.table_aop_list',['data' => $data]);
        }else{
            abort(403);
        }
    }
}
