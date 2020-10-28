<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\WfpPerformanceIndicator;
use App\PpmpItems;
use App\WfpActivity;
use App\Views\ProcurementMedSupplies;
use DB;
class PpmpController extends Controller
{
    //

    public $paginate_ppmp_item_list ;


    public function __construct(){
        $this->paginate_ppmp_item_list = 20;
    }

    public function index(Request $req){
        $data=[];
        $data["wfp_code"] = Crypt::decryptString($req->wfp_code);
        $data["wfp_act_id"] = $req->wfp_act_id;
        $data["wfp_act_pi"] = WfpPerformanceIndicator::where('wfp_code',Crypt::decryptString($req->wfp_code))->where('wfp_act_id',$req->wfp_act_id)->get()->toArray();
        $data["cost"] = [
            'budget_amount' => 0,
            'ppmp_amount' =>0,
            'ppmp_amount_p' => 0,
            'balance' => 0,
            'balance_amount_p' => 0
        ];
        $data["ppmp_item_category"] = ProcurementMedSupplies::select(DB::raw('classification'))->distinct('classification')->get()->toArray();
        for($i =0 ; $i < count($data["ppmp_item_category"])  ; $i++ ){
            $data["ppmp_item_category"][$i]["item_count"] = ProcurementMedSupplies::where('price','!=',0)->where('classification','=',$data["ppmp_item_category"][$i]["classification"])->count();
        }

        // dd($data);

        return view('pages.transaction.ppmp.ppmp',['data' => $data]);
    }

    public function getCartDetailsByWfpActivity(Request $req){
        $data =[];
        $data["ppmp_items"] = [];
        // $a = PpmpItems::where('wfp_act_per_indicator_id',$req->pi_id)->get();

        // if($a){
        //     $data["ppmp_items"] = $a->toArray();
        // }
        $data["ppmp_items"] = DB::select('CALL GET_PPMP_PI_ITEMS(?)' , array($req->pi_id));

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

    public function getAllPPMPItemList(Request $req){
        if($req->has('sorted')){

            $i ;
            $arr = $req->sorted;
            for($i = 0; $i < count($arr); $i++){
                $arr[$i] = str_replace('_',' ',$arr[$i]);
            }
            $data = ProcurementMedSupplies::where('price','!=',0)
                                            ->whereIn('classification',$arr)
                                            ->paginate($this->paginate_ppmp_item_list);
        }else{
            $data = ProcurementMedSupplies::where('price','!=',0)->paginate($this->paginate_ppmp_item_list);
        }
        return view('pages.transaction.ppmp.components.med_supplies_list',['data' => $data]);
    }

    public function addPPMPItemsByPI(Request $req){
        if($req->ajax()){
            // dd($req->all());
            $b = PpmpItems::where('wfp_act_per_indicator_id',$req->twapi)
            ->where('item_type',$req->type)->where('item_id',$req->id)->where('price',$req->price)->first();
            if($b){
                return 'duplicate';
            }else{
                $a = new PpmpItems;
                $a->wfp_act_per_indicator_id = $req->twapi;
                $a->item_type = $req->type;
                $a->item_id = $req->id;
                $a->price = $req->price;
                $a->jan = $req->jan;
                $a->feb = $req->feb;
                $a->mar = $req->mar;
                $a->apr = $req->apr;
                $a->may = $req->may;
                $a->june = $req->june;
                $a->july = $req->july;
                $a->aug = $req->aug;
                $a->sept = $req->sept;
                $a->oct = $req->oct;
                $a->nov = $req->nov;
                $a->dec = $req->dec;
                return $a->save() ? 'success' : 'failed';
            }
        }else{
            abort(403);
        }
    }

    public function deletePPMPItemsById(Request $req){
        if($req->ajax()){
            return PpmpItems::where('id',$req->ppmp_id)->delete() ? 'success' : 'failed';
        }else{
            abort(403);
        }
    }
}
