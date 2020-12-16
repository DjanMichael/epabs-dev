<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Views\ReportAppCategory;
use App\Views\ReportWFPBLI;
use App\RefBudgetLineItem;
use App\RefSourceOfFund;

use App\RefActivityCategory;
use PDF;
class ReportsController extends Controller
{
    public function redirectToAPP()
    {
        $data["years"] = \App\RefYear::all();
        return view('pages.reports.rep_app',['data'=>$data]);
    }

    public function generateAPP(Request $req){
        $data["app_category"] = ReportAppCategory::select('classification')->get()->toArray();
        $data["static"] = [
                            'type' => $req->type,
                            'type_title' =>$req->type_title,
                            'year_id' =>$req->year_id,
                            'year' =>$req->year
                        ];
        $pdf = \App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('components.global.reports.print_app',['data'=>$data]);
        $pdf->setPaper('legal', 'landscape');
        return  $pdf->stream($req->type_title .'_' . $req->year . '.pdf');
        // return view('components.global.reports.print_app',['data'=>$data,'type'=>$req->type]);
    }

    public function generateWFP(Request $req){
        $data["static"] = [
                            'rep' => $req->rep,
                            'rep_sub'=>$req->rep_sub,
                            'year' =>$req->year,
                            'year_id'=> $req->year_id
                        ];
        if($req->rep == "category"){
            if($req->rep_sub == "ALL"){
                $data["app_category"] = RefActivityCategory::all()->toArray();
            }else{
                $data["app_category"] = [$req->rep_sub];
            }

        }else if ($req->rep =="bli"){
            if($req->rep_sub == "ALL"){
                $data["bli"] = ReportWFPBLI::where('year',$req->year)->get()->toArray();
            }else{
                $data["bli"] = ReportWFPBLI::where('year',$req->year)->where('id',$req->rep_sub)->get()->toArray();
            }
        }

        $pdf = \App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('components.global.reports.print_program_cosolidated_wfp',['data'=>$data]);
        $pdf->setPaper('legal', 'landscape');

        return  $pdf->stream($req->rep .'_' . $req->year . '.pdf');
    }

    // public function redirectToBLI()
    // {
    //     $data["years"] = \App\RefYear::all();
    //     return view('pages.reports.rep_bli',['data'=>$data]);
    // }

    public function redirectToWfpConsolidated()
    {
        $data["years"] = \App\RefYear::all();
        $data["bli"] = RefBudgetLineItem::all();
        $data["category"] = RefActivityCategory::select('category')->get()->toArray();
        return view('pages.reports.rep_consolidated_wfp',['data'=>$data]);
    }

    public function activityTimeFrameConvertToMonths($txt){
        $arr = explode(',', $txt);
        $str = "";
        $month = ["January","Febuary","March","April","May","June","July","August","September","October","November","December"];
        $i = 0;
        foreach($arr as $r){
            if($i == 11){
                $str .= ($r == 'Y' ? $month[$i] : '');
            }else{
                $str .= ($r == 'Y' ? $month[$i] . ', ' : '');
            }
            $i++;
        }

        $str = rtrim($str, ", ");
        return $str;
    }

    public function getSourceOfFundNameById($id){
        $a = RefSourceOfFund::where('id',$id)->first();
        return $a->sof_classification ?: '';
    }

    public function getActCategoryNameToId($name){
        $a = RefActivityCategory::where('category',$name)->first();
        return $a->id ?: '';
    }
}


