<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefItemUnit;
use App\RefClassification;
use App\RefPrice;
use App\TableProcurementSupplies;
use App\Views\ProcurementSupplies;

class ProcurementSuppliesController extends Controller
{
    public function index(){ return view('pages.reference.procurement.procurement_supplies'); }

    public function getProcurementSupplies() {
        $data = ProcurementSupplies::paginate(10);
        return view('pages.reference.procurement.table.display_item',['procurement_item'=> $data]);
    }

    public function getProcurementSuppliesByPage(Request $request){
        if($request->ajax())
        {
            $data = ProcurementSupplies::paginate(10);
            return view('pages.reference.procurement.table.display_item',['procurement_item'=> $data]);
        }
    }

    public function getProcurementSuppliesSearch(Request $request) {
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
            return view('pages.reference.procurement.table.display_item',['procurement_item'=> $data]);
        }
    }

    public function getProcurementSuppliesPrice(Request $request){
        $data = RefPrice::where('procurement_item_id', $request->id)
                            ->where('procurement_type', 'SUP')
                            ->orderBy('effective_date', 'DESC')
                            ->paginate(5);
        return view('pages.reference.procurement.table.display_price',
                        ['procurement_item_price'=> $data, 'procurement_item_id'=> $request->id]);
    }

    public function getProcurementSuppliesPriceByPage(Request $request){
        if($request->ajax())
        {
            $data = RefPrice::where('procurement_item_id', $request->id)
                            ->where('procurement_type', 'SUP')
                            ->paginate(5);
            return view('pages.reference.procurement.table.display_price',['procurement_item_price'=> $data]);
        }
    }

    public function getAddForm(){
        $data['unit'] = RefItemUnit::where('status','ACTIVE')->get();
        $data['classification'] = RefClassification::where('status','ACTIVE')->get();
        return view('pages.reference.procurement.form.add_procurement_item', ['data'=> $data]);
    }

    public function getChangePriceForm(){
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
                                'classification_id' => $request->classification_id, 'fix_price' => $request->fix_price,
                                'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                $supplies = [
                    'description' => $request->description,
                    'unit_id' => $request->unit_id,
                    'classification_id' => $request->classification_id,
                    'fix_price' => $request->fix_price,
                    'status' => $request->status
                ];

                $latest_record = TableProcurementSupplies::create($supplies)->id;

                $price = [
                    'procurement_item_id' => $latest_record,
                    'procurement_type' => "SUP",
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

    public function storePrice(Request $request) {

        $check = RefPrice::find($request->id)
                    ? RefPrice::where([
                                    ['procurement_item_id', $request->procurement_item_id],
                                    ['procurement_type', 'SUP'],
                                    ['effective_date', $request->effective_date],
                                    ['id', '<>', $request->id]
                                    ])->first()
                    : RefPrice::where([
                                    ['procurement_item_id', $request->procurement_item_id],
                                    ['procurement_type', 'SUP'],
                                    ['effective_date', $request->effective_date]
                                    ])->first();

        if ($check) {
            return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
        }
        else {
            $check = RefPrice::find($request->id);
            if ($check) {
                $check->update(['price' => (float)$request->price, 'effective_date' => $request->effective_date]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                $price = [
                    'procurement_item_id' => $request->procurement_item_id,
                    'procurement_type' => "SUP",
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
