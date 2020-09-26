<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefItemUnit;
use App\RefClassification;
use App\TableProcurementSupplies;
use App\Views\ProcurementSupplies;
use DB;

class ProcurementSuppliesController extends Controller
{
    public function index(){
        
        $data = [];
        $data['unit'] = RefItemUnit::where('status','ACTIVE')->get();
        $data['classification'] = RefClassification::where('status','ACTIVE')->get();
        // $data["procurement"] = ProcurementSupplies::paginate(10);
        $data["form-type"] = "Add Procurement Supplies";
        return view('pages.reference.procurement.procurement_supplies',['data' => $data]);
 
    }
    
    public function getProcurementSupplies()
    {
        $data = ProcurementSupplies::paginate(10);
        return view('pages.reference.table.display_supplies',['procurement_supplies'=> $data]);
    }

    public function getProcurementSuppliesByPage(Request $request){
        if($request->ajax())
        {
            $data = ProcurementSupplies::paginate(10);
            return view('pages.reference.table.display_supplies',['procurement_supplies'=> $data]);
        }
    }

    public function getProcurementSuppliesSearch(Request $request)
    {
        if($request->ajax())
        {
            $q = $request->query;
            if(is_null($q)){
                $data = ProcurementSupplies::where(fn($query) => $query->where('fix_price' ,'LIKE', '%'. $q .'%'))
                ->paginate(10);
            }else{
                $data = ProcurementSupplies::paginate(10);
            }
            // return dd($q);
            return view('pages.reference.table.display_supplies',['procurement_supplies'=> $data]);
        }
    }

    public function store(Request $request) {
        
        $tableProcurementSupplies = TableProcurementSupplies::create($request->all());
        if ($tableProcurementSupplies) {
            return response()->json(['message'=>'Successfully inserted data!','type'=>'insert']);
        } else {
            return response()->json(['message'=>'error']);
        }

    }

}