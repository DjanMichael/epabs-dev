<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\WfpPerformanceIndicator;
use App\PpmpItems;
use App\WfpActivity;

class PpmpController extends Controller
{
    //
    public function index(Request $req){
        $data=[];
        $data["wfp_code"] = Crypt::decryptString($req->wfp_code);
        $data["wfp_act_id"] = $req->wfp_act_id;
        $data["wfp_act_pi"] = WfpPerformanceIndicator::where('wfp_act_id',$req->wfp_act_id)->get()->toArray();
        $data["cost"] = [
            'budget_amount' => 0,
            'ppmp_amount' =>0,
            'ppmp_amount_p' => 0,
            'balance' => 0,
            'balance_amount_p' => 0
        ];

        return view('pages.transaction.ppmp.ppmp',['data' => $data]);
    }

    public function getCartDetailsByWfpActivity(Request $req){
        $data =[];
        $data["ppmp_items"] = [];
        $a = PpmpItems::where('wfp_act_per_indicator_id',$req->pi_id)->get();
        if($a){
            $data["ppmp_items"] = $a->toArray();
        }
        // dd($data);
        return view('components.global.wfp_activity_cart_drawer',['data' => $data]);
    }

    public function getPIDetails(Request $req){
        if($req->ajax()){
            $data = [];
            $data["wfp_act_pi"] = WfpPerformanceIndicator::where('id',$req->twapi_id)->first();
            $data["ppmp_items"] = PpmpItems::where('wfp_act_per_indicator_id',$req->twapi_id)->get()->toArray();
            $data["cost"] = [];
            $budget = $data["wfp_act_pi"]["cost"];
            $item_cost = 0;
            if($data["wfp_act_pi"]){
                //calculate total costing use in ppmp items
                if(count( $data["ppmp_items"] ) != 0){
                    foreach($data["ppmp_items"] as $row){
                        $item_cost +=  ($row["price"] * ($row["jan"] + $row["feb"] +
                                                        $row["mar"] + $row["apr"] +
                                                        $row["may"] + $row["june"] +
                                                        $row["july"] + $row["aug"] +
                                                        $row["sept"] + $row["oct"] +
                                                        $row["nov"] + $row["dec"]));
                    }

                    $data["cost"] = [
                        'budget_amount' => number_format($budget,2),
                        'ppmp_amount' => number_format($item_cost,2),
                        'ppmp_amount_p' =>  number_format(($item_cost / $budget ) * 100,2),
                        'balance' => number_format($budget - $item_cost,2),
                        'balance_amount_p' =>number_format((($budget - $item_cost) / $budget) * 100,2)

                    ];
                }else{
                    $data["cost"] = [
                        'budget_amount' => number_format($budget,2),
                        'ppmp_amount' => number_format($item_cost,2),
                        'ppmp_amount_p' => 0,
                        'balance' => number_format($budget - $item_cost,2),
                        'balance_amount_p' => 100
                    ];
                }
            }




            return $data;
        }else{
            abort(403);
        }
    }
}
