<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefItemUnit;
use App\RefClassification;
use App\TableProcurementMedicine;
use App\Views\ProcurementMedicine;

class ProcurementMedicineController extends Controller
{
    public function index(){
        
        $data = [];
        return view('pages.reference.procurement.procurement_medicine',['data' => $data]);
 
    }
    
    public function getProcurementMedicine()
    {
        $data = ProcurementMedicine::paginate(10);
        return view('pages.reference.procurement.table.display_medicine',['procurement_medicine'=> $data]);
    }

    public function getProcurementMedicineByPage(Request $request){
        if($request->ajax())
        {
            $data = ProcurementMedicine::paginate(10);
            return view('pages.reference.procurement.table.display_medicine',['procurement_medicine'=> $data]);
        }
    }

    public function getProcurementMedicineSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = ProcurementMedicine::where('description' ,'LIKE', '%'. $query .'%')->paginate(10);
            }else{
                $data = ProcurementMedicine::paginate(10);
            }
            return view('pages.reference.procurement.table.display_medicine',['procurement_medicine'=> $data]);
        }
    }  

    public function getAddForm(){
        $data['unit'] = RefItemUnit::where('status','ACTIVE')->get();
        $data['classification'] = RefClassification::where('status','ACTIVE')->get();
        return view('pages.reference.procurement.form.add_procurement_medicine', ['data'=> $data]);        
    }

    public function getChangePriceForm(){
        // $data['unit'] = RefItemUnit::where('status','ACTIVE')->get();
        // $data['classification'] = RefClassification::where('status','ACTIVE')->get();
        return view('pages.reference.procurement.form.change_price');        
    }

    public function store(Request $request) {
        
        $tableProcurementMedicine = TableProcurementMedicine::create($request->all());
        if ($tableProcurementMedicine) {
            return response()->json(['message'=>'Successfully inserted data!','type'=>'insert']);
        } else {
            return response()->json(['message'=>'error']);
        }

    }
}
