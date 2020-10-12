<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefItemUnit;
use App\RefClassification;
use App\RefPrice;
use App\TableProcurementMedicine;
use App\Views\ProcurementMedicine;

class ProcurementMedicineController extends Controller
{
    public function index(){ return view('pages.reference.procurement.procurement_medicine'); }

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
                $data = ProcurementMedicine::where('description' ,'LIKE', '%'. $query .'%')
                                                ->orWhere('classification' ,'LIKE', '%'. $query .'%')
                                                ->paginate(10);
            }else{
                $data = ProcurementMedicine::paginate(10);
            }
            return view('pages.reference.procurement.table.display_medicine',['procurement_medicine'=> $data]);
        }
    }

    public function getProcurementMedicinePrice(Request $request)
    {
        $data = RefPrice::where('procurement_item_id', $request->id)
                            ->where('procurement_type', 'MED')
                            ->paginate(10);
        return view('pages.reference.procurement.table.display_medicine_price',['procurement_medicine_price'=> $data]);
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

        $check = TableProcurementMedicine::find($request->id)
                    ? TableProcurementMedicine::where('description', $request->description)->where('id', '<>', $request->id)->first()
                    : TableProcurementMedicine::where('description', $request->description)->first();

        if ($check) {
            return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
        } else {
            $check = TableProcurementMedicine::find($request->id);
            if ($check) {
                $check->update(['description' => $request->description, 'unit_id' => $request->unit_id,
                                'classification_id' => $request->classification_id, 'fix_price' => $request->fix_price,
                                'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                $medicine = [
                    'description' => $request->description,
                    'unit_id' => $request->unit_id,
                    'classification_id' => $request->classification_id,
                    'fix_price' => $request->fix_price,
                    'status' => $request->status
                ];

                $latest_record = TableProcurementMedicine::create($medicine)->id;

                $price = [
                    'procurement_item_id' => $latest_record,
                    'procurement_type' => "MED",
                    'price' => $request->price,
                    'effective_date' => $request->effective_date
                ];

                RefPrice::create($price);
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Something went wrong']);
            }
        }

    }
}
