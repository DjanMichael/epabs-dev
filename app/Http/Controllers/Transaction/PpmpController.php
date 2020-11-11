<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\WfpPerformanceIndicator;
use App\PpmpItems;
use App\WfpActivity;
use App\Views\ProcurementMedSupplies;
use App\TablePiCateringBatches;
use App\RefLocation;
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

        $data["location"] = RefLocation::select('id','region')->groupBy('region')->get()->toArray();
        // dd($data);

        return view('pages.transaction.ppmp.ppmp',['data' => $data]);
    }

    public function getBatchesByPiId(Request $req){
        if($req->ajax()){
            // dd($req->t[0]);
            if($req->t[0] == "ALL"){
                $data = TablePiCateringBatches::where('pi_id',$req->d["twapi_id"])->get()->toArray();
                return view('pages.transaction.ppmp.components.select_catering_batches',['data' => $data]);
            }else{
                return ["type" => "ADDING_ITEM","batch_id" => $req->t[1]];
            }
        }else{
            abort(403);
        }
    }

    public function getCateringProvince(Request $req){
        if($req->ajax()){
            $data = RefLocation::where('region',$req->reg)->select('id','region','province')->groupBy('province')->get()->toArray();
            return view('pages.transaction.ppmp.components.select_catering_province',['data' => $data]);
        }else{
            abort(403);
        }
    }

    public function getCateringCity(Request $req){
        if($req->ajax()){
            $data = RefLocation::where('province',$req->prov)->select('id','region','province','city')->groupBy('city')->get()->toArray();
            return view('pages.transaction.ppmp.components.select_catering_city',['data' => $data]);
        }else{
            abort(403);
        }
    }

    public function getCartDetailsByWfpActivity(Request $req){
        $data =[];
        $data["ppmp_items"] = [];
        // $a = PpmpItems::where('wfp_act_per_indicator_id',$req->pi_id)->get();

        // if($a){
        //     $data["ppmp_items"] = $a->toArray();
        // }
        $data["ppmp_items"] = DB::select('CALL GET_PPMP_PI_ITEMS(?,?)' , array($req->pi_id,$req->batch != null ? $req->batch : '' ));

        return view('components.global.wfp_activity_cart_drawer',['data' => $data]);
    }

    public function getPIDetails(Request $req){
        if($req->ajax()){
            $data = [];
            $data["wfp_act_pi"] = WfpPerformanceIndicator::where('id',$req->twapi_id)->first();
            $data["ppmp_items"] = [];
            // dd($req->all());
            if($data["wfp_act_pi"]["is_catering"] == "Y"){
                // $data["ppmp_items"] = PpmpItems::where('wfp_act_per_indicator_id',$req->twapi_id)->get()->toArray();
                $data["ppmp_items"] = PpmpItems::where('wfp_act_per_indicator_id',$req->twapi_id)
                                                ->where('batch_id',$req->batch_id)->get()->toArray();
            }else{
                $data["ppmp_items"] = PpmpItems::where('wfp_act_per_indicator_id',$req->twapi_id)->get()->toArray();
            }

            $data["cost"] = [];
            $budget = $data["wfp_act_pi"]["cost"];
            $item_cost = 0;
            if($data["wfp_act_pi"]){
                $data["wfp_act"] = WfpActivity::select('activity_timeframe')->where('id',$data["wfp_act_pi"]->wfp_act_id)->limit(1)->get()->toArray();
                $arr = explode(',',$data["wfp_act"][0]["activity_timeframe"]);
                $months_list = [];
                $i =1;
                $j =0;
                foreach($arr as $row){
                    if($row == 'Y'){
                        $months_list[$j] = $this->activityTimeFrameConvertToMonths($i);
                        $j++;
                    }
                    $i++;
                }

                // $months_list = rtrim($months_list,', ');

                $data["wfp_act"] = [
                                "data_list" => $data["wfp_act"][0]["activity_timeframe"],
                                "data_arr"=> $months_list
                                ];

                //calculate total costing use in ppmp items
                if(count( $data["ppmp_items"]) != 0){
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


            // dd($data["wfp_act_pi"]["is_catering"]);
            // dd($data);
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
            $data = ProcurementMedSupplies::where('price','!=',0)
                                            ->where(fn($q) =>
                                                $q->where('description','LIKE','%' . $req->q . '%')
                                            )->paginate($this->paginate_ppmp_item_list);
        }
        return view('pages.transaction.ppmp.components.med_supplies_list',['data' => $data]);
    }

    public function addPPMPItemsByPI(Request $req){
        if($req->ajax()){


            if($req->batch == null){
                $b = PpmpItems::where('wfp_act_per_indicator_id',$req->twapi)
                            ->where('item_type',$req->type)
                            ->where('item_id',$req->id)
                            ->where('price',$req->price)->first();
                // dd($b);
            }else{
                $b = PpmpItems::where('wfp_act_per_indicator_id',$req->twapi)
                            ->where('item_type',$req->type)
                            ->where('item_id',$req->id)
                            ->where('price',$req->price)
                            ->where('batch_id',$req->batch)->first();
            }

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
                if($req->batch != null){
                    $a->batch_id = $req->batch;
                }
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

    public function getPPMPView(Request $req){
        if($req->ajax()){
            // dd($req->all());
            $wfp_act_ids = WfpPerformanceIndicator::where('wfp_code',$req->wfp_code)->get()->toArray();
            $pi_ids = [];

            if(count($wfp_act_ids) > 0){
                $i =0;
                for ($i=0; $i < count($wfp_act_ids) ; $i++ ){
                    $pi_ids[$i] = $wfp_act_ids[$i]["id"];
                }
            }
            $vw = "vw_procurement_drum_supplies_items";
            $data["ppmp_items"] = \DB::table('tbl_ppmp_items')
                                        ->join($vw,function($q) use ($vw)
                                        {
                                            $q->on($vw . '.item_type','=','tbl_ppmp_items.item_type');
                                            $q->on($vw . '.id','=','tbl_ppmp_items.item_id');
                                        })
                                        ->join('tbl_wfp_activity_per_indicator','tbl_wfp_activity_per_indicator.id','tbl_ppmp_items.wfp_act_per_indicator_id')
                                        ->whereIn('tbl_ppmp_items.wfp_act_per_indicator_id',$pi_ids)->get()->toArray();

            // $pi_ids = Arr::flatten($pi_ids);
            // dd($data);
            return view('components.global.wfp_ppmp_drawer',['data'=>$data]);
        }else{
            abort(403);
        }
    }

    public function getCateringLocation(Request $req){
        $a = RefLocation::where('id',$req->id)->first();
        return $a ;
    }

    public function getCateringBatchDetails(Request $req){
        // dd($req->all());
        $data =[];
        $data["ppmp_items"] = [];
        if ($req->batch_id != null)
        {
            $data["ppmp_items"] = DB::select('CALL GET_PPMP_PI_ITEMS(?,?)' , array($req->pi_id,$req->batch_id));
        }

        $data["catering_batch"] = TablePiCateringBatches::where('id',$req->batch_id)->first();
        $data["catering_location"] = [];
        if($data["catering_batch"]->batch_location != null){
            $data["catering_location"] = RefLocation::where('id',$data["catering_batch"]->batch_location)->first();
        }
        // dd($data);
        // return $data;
        return ["data" =>["view" => view('components.global.wfp_activity_cart_drawer',['data' => $data]), "data" => $data]];
    }

    public function activityTimeFrameConvertToMonths($i){
        $month = ["January","Febuary","March","April","May","June","July","August","September","October","November","December"];
        return $month[$i-1];
    }

}
