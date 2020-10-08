<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefItemUnit;
use App\RefClassification;
use App\TableProcurementSupplies;
use App\Views\ProcurementSupplies;

class ProcurementSuppliesController extends Controller
{
    public function index(){ return view('pages.reference.procurement.procurement_supplies'); }

    public function getProcurementSupplies()
    {
        $data = ProcurementSupplies::paginate(10);
        return view('pages.reference.procurement.table.display_supplies',['procurement_supplies'=> $data]);
    }

    public function getProcurementSuppliesByPage(Request $request){
        if($request->ajax())
        {
            $data = ProcurementSupplies::paginate(10);
            return view('pages.reference.procurement.table.display_supplies',['procurement_supplies'=> $data]);
        }
    }

    public function getProcurementSuppliesSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = ProcurementSupplies::where('description' ,'LIKE', '%'. $query .'%')
                                                ->orWhere('classification' ,'LIKE', '%'. $query .'%')
                                                ->paginate(10);
            }else{
                $data = ProcurementSupplies::paginate(10);
            }
            return view('pages.reference.procurement.table.display_supplies',['procurement_supplies'=> $data]);
        }
    }

    public function getAddForm(){
        $data['unit'] = RefItemUnit::where('status','ACTIVE')->get();
        $data['classification'] = RefClassification::where('status','ACTIVE')->get();
        return view('pages.reference.procurement.form.add_procurement_supplies', ['data'=> $data]);
    }

    public function getChangePriceForm(){
        // $data['unit'] = RefItemUnit::where('status','ACTIVE')->get();
        // $data['classification'] = RefClassification::where('status','ACTIVE')->get();
        return view('pages.reference.procurement.form.change_price');
    }

    public function store(Request $request) {

        $check = TableProcurementSupplies::find($request->id)
                        ? TableProcurementSupplies::where('description', $request->description)->where('id', '<>', $request->id)->first()
                        : TableProcurementSupplies::where('description', $request->description)->first();

        if ($check) {
            return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
        } else {
            $check = TableProcurementSupplies::find($request->id);
            if ($check) {
                $check->update(['description' => $request->description, 'unit_id' => $request->unit_id,
                                'classification_id' => $request->classification_id, 'classification_id' => $request->classification_id,
                                'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                TableProcurementSupplies::create($request->all());
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Something went wrong']);
            }
        }

    }

}
