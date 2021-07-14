<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Views\ReportAppCategory;
use App\Views\ReportWFPBLI;
use App\RefBudgetLineItem;
use App\RefSourceOfFund;
use App\RefActivityCategory;
use App\Views\BudgetExpenseClass;
use App\Views\BudgetFunctionClass;
use App\Views\GADBudgetSummary;
use App\GlobalSystemSettings;
use App\RefYear;
use Auth;
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

        $data["details"] = \App\Views\ReportAppDetails::where('year_id',$data["static"]["year_id"])
                        ->get()->toArray();
        $data["details"] = collect($data["details"])->groupBy('classification');


        // dd($data);
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

    public function generateBudgetStatistics(Request $req)
    {
        $data = [];

        // $program = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
        $year_id = $req->year_id;
        $data["budget"]["expense_class"]["mooe"] = BudgetExpenseClass::where('category','MAINTENANCE & OTHER OPERATING EXPENSES')
                                                                           ->where('year_id',$year_id)
                                                                           ->get();
        $data["budget"]["expense_class"]["mooe"] = ["amount"=> ($data["budget"]["expense_class"]["mooe"])->sum('total'), "act_no" => ($data["budget"]["expense_class"]["mooe"])->count()];
        $data["budget"]["expense_class"]["co"] = BudgetExpenseClass::where('category','CAPITAL OUTLAYS')
                                                                    ->where('year_id',$year_id)
                                                                    ->get();
        $data["budget"]["expense_class"]["co"] = ["amount"=> ($data["budget"]["expense_class"]["co"])->sum('total'), "act_no" => ($data["budget"]["expense_class"]["co"])->count()];
        $data["budget"]["function_class"]["strategic"] = BudgetFunctionClass::where('year_id',$year_id)->where('class','STRATEGIC FUNCTION')->first() ?? 0;
        $data["budget"]["function_class"]["core"] = BudgetFunctionClass::where('year_id',$year_id)->where('class','CORE FUNCTION')->first() ?? 0;
        $data["budget"]["function_class"]["support"] = BudgetFunctionClass::where('year_id',$year_id)->where('class','SUPPORT FUNCTION')->first() ?? 0;

        $data["budget"]["GAD"]["YES"] = GADBudgetSummary::where('activity_gad_related','YES')->where('year_id',$year_id)->first();
        $data["budget"]["GAD"]["NO"] = GADBudgetSummary::where('activity_gad_related','NO')->where('year_id',$year_id)->first();

        // dd($data);
        $data["year"] = (RefYear::where('id',$year_id)->first())->year;
        $pdf = \App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('components.global.reports.print_budget_statistics',['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return  $pdf->stream(Auth::user()->id . '_budget_distribution_report_' . $data["year"] . '.pdf');


        // return view('components.global.reports.print_budget_statistics',['data'=>$data]);
    }

    public function redirectToBudgetDistribution(Request $req)
    {
        $data["years"] = \App\RefYear::all();
        return view('pages.reports.rep_others',['data' => $data]);
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


