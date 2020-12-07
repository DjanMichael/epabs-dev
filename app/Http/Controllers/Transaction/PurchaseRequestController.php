<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProgramPurchaseRequest;
use App\ProgramPurchaseRequestDetails;
use App\ProgramPurchaseRequestStatus;
use App\GlobalSystemSettings;
use App\Wfp;
use App\WfpActivity;
use App\PpmpItems;
use App\TableUnitProgram;
use App\RefUnits;
use App\Views\PRList;
use App\Views\ProcurementMedSupplies;
use App\ZWfpLogs;
use DB;
use Auth;
class PurchaseRequestController extends Controller
{
    public $pagination ;

    public function __construct(){
        $this->pagination = 10;
    }
    public function index(){
        $data = [];
        $settings = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
        if(Auth::user()->role->roles == "ADMINISTRATOR" || Auth::user()->role->roles == "PROCUREMENT"){
            $data["pr_list"] = PRList::paginate($this->pagination);
        }else{
            $data["pr_list"] = PRList::where('program_id',$settings->select_program_id)->where('year_id',$settings->select_year)->paginate($this->pagination);
        }

        return view('pages.transaction.pr.pr',['data' =>$data]);
    }

    public function redirectCreatePurchaseRequest(){
        $data =[];
        $settings = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
        $data["wfp"] = Wfp::where('year_id',$settings["select_year"])->where('program_id',$settings["select_program_id"])->first();
        $ppmp_code = DB::select('CALL generate_ppmp_code(?,?)',array($settings["select_year"], $settings["select_program_id"]));
        $data["ppmp_code"] = $ppmp_code[0]->ppmp_code;
        $data["unit_program"] = TableUnitProgram::where('program_id',$settings["select_program_id"])->first();
        $data["unit"] = RefUnits::where('id',$data["unit_program"]->unit_id)->first();
        $checkDulpicate = ProgramPurchaseRequest::where('pr_code',$data["ppmp_code"])->first();
        $save_1;
        if(!$checkDulpicate){
            $a = new ProgramPurchaseRequest;
            $a->pr_code = $ppmp_code[0]->ppmp_code;
            $a->program_id =  $settings["select_program_id"];
            $a->year_id =  $settings["select_year"];
            $a->agency = env('PR_AGENCY');
            $a->office = $data["unit"]->section;
            $a->division = $data["unit"]->division;
            $a->pr_purpose ="test";
            $a->prepared_user_name = Auth::user()->name;
            $a->prepared_user_id = Auth::user()->id;
            $save_1 = $a->save();

            $b = new ProgramPurchaseRequestStatus;
            $b->pr_code =  $a->pr_code;
            $b->status = "CREATED";
            $b->entry_by = Auth::user()->id;
            $b->save();

            if($save_1){
                return view('pages.transaction.pr.pr_create',['data'=> $data]);
            }
        }else{
            return 'duplicate';
        }
        return view('pages.transaction.pr.pr_create',['data'=> $data]);

    }

    public function openPrView(Request $req){
        $data =[];
        $data["item_list"] = ProgramPurchaseRequestDetails::where('pr_code',$req->pr_code)->get()->toArray();
        return view('components.global.pr_drawer',['data'=>$data]);
    }

    public function getApprovedWfp(Request $req)
    {
        if($req->ajax()){
            $data =[];
            $settings = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
            $wfp = ZWfpLogs::join('tbl_wfp','tbl_wfp.code','z_wfp_logs.wfp_code')
                                            ->where('tbl_wfp.program_id', $settings["select_program_id"])
                                            ->where('z_wfp_logs.status','WFP')
                                            ->where('z_wfp_logs.remarks','APPROVED')
                                            ->orderBy('z_wfp_logs.id','DESC')
                                            ->first();
            $ppmp = ZWfpLogs::join('tbl_wfp','tbl_wfp.code','z_wfp_logs.wfp_code')
                                            ->where('tbl_wfp.program_id', $settings["select_program_id"])
                                            ->where('z_wfp_logs.status','PPMP')
                                            ->where('z_wfp_logs.remarks','APPROVED')
                                            ->orderBy('z_wfp_logs.id','DESC')
                                            ->first();
            if($wfp != null && $ppmp != null){
                $data["wfp_approved"] = Wfp::join('tbl_wfp_activity','tbl_wfp_activity.wfp_code','tbl_wfp.code')
                                            ->groupBy('tbl_wfp.code')->get()->toArray();
                return view('pages.transaction.pr.components.select_approved_wfp',['data'=>$data]);
            }else{
                return view('pages.transaction.pr.components.select_approved_wfp',['data'=>null]);
            }

        }else{
            abort(403);
        }
    }

    public function getWfpActivityByWfp(Request $req){
        if($req->ajax()){
            $data["wfp_activity"] = WfpActivity::where('wfp_code',$req->wfp_code)->get()->toArray();
            return view('pages.transaction.pr.components.select_approved_wfp_act',['data'=>$data]);
        }else{
            abort(403);
        }
    }

    public function getWfpActivityItems(Request $req){
        if($req->ajax()){
            $vw = "vw_procurement_drum_supplies_items";
            $data["pr_code"] = $req->pr_code;
            $data["wfp_act_id"] = $req->wfp_act_id;
            $data["wfp_code"] = $req->wfp_code;
            //get all remaining items to be PR
            $pr_exist_item_ids_supplies = ProgramPurchaseRequestDetails::where('wfp_code',$req->wfp_code)
                                                                        ->where('wfp_act',$req->wfp_act_id)
                                                                        ->where('item_type','SUPPLIES')
                                                                        ->select('item_id')
                                                                        ->get()->toArray();
            $pr_exist_item_ids_drum = ProgramPurchaseRequestDetails::where('wfp_code',$req->wfp_code)
                                                                        ->where('wfp_act',$req->wfp_act_id)
                                                                        ->where('item_type','DRUM')
                                                                        ->select('item_id')
                                                                        ->get()->toArray();

            $data["wfp_act_item_supplies"] = PpmpItems::join($vw,function($q) use ($vw)
                                                        {
                                                            $q->on($vw . '.item_type','=','tbl_ppmp_items.item_type');
                                                            $q->on($vw . '.id','=','tbl_ppmp_items.item_id');
                                                        })
                                                        ->whereNotIn('item_id', $pr_exist_item_ids_supplies)
                                                        ->where('wfp_act_per_indicator_id',$req->wfp_act_id)
                                                        ->where('tbl_ppmp_items.item_type','SUPPLIES')
                                                        ->get()->toArray();
            $data["wfp_act_item_drum"] = PpmpItems::join($vw,function($q) use ($vw)
                                                    {
                                                        $q->on($vw . '.item_type','=','tbl_ppmp_items.item_type');
                                                        $q->on($vw . '.id','=','tbl_ppmp_items.item_id');

                                                    })
                                                    ->whereNotIn('item_id', $pr_exist_item_ids_drum)
                                                    ->where('wfp_act_per_indicator_id',$req->wfp_act_id)
                                                    ->where('tbl_ppmp_items.item_type','DRUM')
                                                    ->get()->toArray();

            return view('pages.transaction.pr.components.items_activity',['data'=>$data]);
        }else{
            abort(403);
        }
    }

    public function addItemToPrDetails(Request $req){
        if($req->ajax()){

            $item = ProcurementMedSupplies::where('id',$req->item_id)->where('item_type',$req->item_type)->first();
            $duplicate = ProgramPurchaseRequestDetails::where('pr_code',$req->pr_code)
                                                        ->where('item_id',$req->item_id)
                                                        ->where('item_type',$req->item_type)->first();
            if($duplicate){
                return 'duplicate';
            }else{
                $a = new ProgramPurchaseRequestDetails;
                $a->wfp_code = $req->wfp_code;
                $a->wfp_act = $req->wfp_act_id;
                $a->pr_code = $req->pr_code;
                $a->item_id = $req->item_id;
                $a->item_type = $req->item_type;
                $a->item_unit = $item->unit_name;
                $a->item_description = $item->description;
                $a->item_classification = $item->classification;
                $a->item_qty = $req->qty;
                $a->item_price = $req->price;
                return $a->save() ? 'success':'failed';
            }

        }else{
            abort(403);
        }
    }

    public function delPrItem(Request $req){
        if($req->ajax()){
            $a = ProgramPurchaseRequestDetails::where('id',$req->id);
            return $a->delete() ? 'success':'failed';
        }else{
            abort(403);
        }
    }

    public function editPr(Request $req){
        $data = [];
        $data['ppmp_code'] = $req->pr_code;
        return view('pages.transaction.pr.pr_create',['data'=>$data]);
    }

    public function getPrHistory(Request $req){
        if($req->ajax()){
            $data = [];
            $data["pr_track"] = ProgramPurchaseRequestStatus::where('pr_code',$req->pr_code)->orderBy('created_at','DESC')->get()->toArray();
            return view('pages.transaction.pr.components.track_pr',['data'=>$data]);
        }else{
            abort(403);
        }
    }

    public function getPrList(Request $req){
        if($req->ajax()){
            $settings = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
            if(Auth::user()->role->roles == "ADMINISTRATOR" || Auth::user()->role->roles == "PROCUREMENT"){
                $data["pr_list"] = PRList::where(fn($q) =>
                                                    $q->orWhere('pr_code',$req->q)
                                                    ->orWhere('division','LIKE','%'. $req->q . '%')
                                                    ->orWhere('section','LIKE','%'. $req->q . '%')
                                                    ->orWhere('program_name','LIKE','%'. $req->q . '%')
                                                    ->orWhere('pr_status','LIKE','%'. (strtolower($req->q) =='created' ? '' : $req->q)  . '%')
                                                    )
                                                    ->paginate($this->pagination);
            }else{
                $data["pr_list"] = PRList::where('program_id',$settings->select_program_id)
                                        ->where('year_id',$settings->select_year)
                                        ->where(fn($q) =>
                                                $q->orWhere('pr_code',$req->q)
                                                ->orWhere('division','LIKE','%'. $req->q . '%')
                                                ->orWhere('section','LIKE','%'. $req->q . '%')
                                                ->orWhere('program_name','LIKE','%'. $req->q . '%')
                                                ->orWhere('pr_status','LIKE','%'. (strtolower($req->q) =='created' ? '' : $req->q)  . '%')
                                        )->paginate($this->pagination);
            }
            return view('pages.transaction.pr.components.pr_list',['data' =>$data]);
        }else{
            abort(403);
        }
    }

    public function deleteProgramPr(Request $req){
        if($req->ajax()){
            try {
                DB::beginTransaction();
                $delPr =  ProgramPurchaseRequest::where('pr_code',$req->pr_code)->delete();
                $delPrDetails =  ProgramPurchaseRequestDetails::where('pr_code',$req->pr_code)->delete();
                DB::commit();
                return  'success';
            } catch (\Exception $e) {
                DB::rollBack();
                return $e->getMessage();
            }
        }else{
            abort(403);
        }
    }
}
