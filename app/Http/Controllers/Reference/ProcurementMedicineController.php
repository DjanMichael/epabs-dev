<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefItemUnit;
use App\RefDmCategory;
use App\RefClassification;
use App\RefPrice;
use App\TableProcurementMedicine;
use App\Views\ProcurementMedSupplies;

class ProcurementMedicineController extends Controller
{
    public function index(){ return view('pages.reference.procurement.procurement_medicine'); }

    public function getProcurementMedicine(){
        $data = ProcurementMedSupplies::where('item_type', 'DRUM')->paginate(10);
        return view('pages.reference.procurement.table.display_item',['procurement_item'=> $data, 'checker'=>'MEDS']);
    }

    public function getProcurementMedicineByPage(Request $request){
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest) {
            $data = ProcurementMedSupplies::where('item_type', 'DRUM')->paginate(10);
            return view('pages.reference.procurement.table.display_item',['procurement_item'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getProcurementMedicineBySearch(Request $request){
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest) {
            $query = $request->q;
            if($query != ''){
                $data = ProcurementMedSupplies::where('item_type', 'DRUM')
                                                ->where(function ($sql) use ($query) {
                                                    $sql->where('description', 'LIKE', '%'. $query .'%')
                                                        ->orWhere('classification' ,'LIKE', '%'. $query .'%');
                                                })
                                                ->paginate(10);
            } else {
                $data = ProcurementMedSupplies::where('item_type', 'DRUM')->paginate(10);
            }
            return view('pages.reference.procurement.table.display_item',['procurement_item'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getProcurementMedicinePrice(Request $request){
        $data = RefPrice::where('procurement_item_id', $request->id)
                            ->where('procurement_type', 'DRUM')
                            ->orderBy('effective_date', 'DESC')
                            ->paginate(5);
        return view('pages.reference.procurement.table.display_price',
                        ['procurement_item_price'=> $data, 'procurement_item_id'=> $request->id]);
    }

    public function getProcurementMedicinePriceByPage(Request $request){
        if($request->ajax())
        {
            $data = RefPrice::where('procurement_item_id', $request->id)
                            ->where('procurement_type', 'DRUM')
                            ->paginate(5);
            return view('pages.reference.procurement.table.display_price',['procurement_item_price'=> $data]);
        }
    }

    public function getAddForm(){
        $data['unit'] = RefItemUnit::where('status','ACTIVE')->get();
        $data['classification'] = RefClassification::where('status','ACTIVE')->get();
        $data['category'] = RefDmCategory::where('status','ACTIVE')->get();
        return view('pages.reference.procurement.form.add_procurement_item', ['data'=> $data]);
    }

    public function getChangePriceForm(){
        return view('pages.reference.procurement.form.change_price');
    }

    public function store(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest) {

            $check = TableProcurementMedicine::find($request->id)
                        ? TableProcurementMedicine::where('description', $request->description)->where('id', '<>', $request->id)->first()
                        : TableProcurementMedicine::where('description', $request->description)->first();

            if ($check) {
                return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
            } else {
                $check = TableProcurementMedicine::find($request->id);
                if ($check) {
                    $check->update(['description' => $request->description, 'unit_id' => $request->unit_id,
                                    'classification_id' => $request->classification_id, 'category_id' => $request->category_id,
                                    'fix_price' => $request->fix_price, 'status' => $request->status]);
                    return response()->json(['message'=>'Successfully updated data','type'=>'update']);
                }
                else if (empty($check)) {
                    $medicine = [
                        'description' => $request->description,
                        'unit_id' => $request->unit_id,
                        'classification_id' => $request->classification_id,
                        'category_id' => $request->category_id,
                        'fix_price' => $request->fix_price,
                        'status' => $request->status
                    ];

                    $latest_record = TableProcurementMedicine::create($medicine)->id;

                    $price = [
                        'procurement_item_id' => $latest_record,
                        'procurement_type' => "DRUM",
                        'price' => $request->price,
                        'effective_date' => $request->effective_date
                    ];

                    RefPrice::create($price);
                    return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
                }
                else {
                    return response()->json(['message'=>'Something went wrong','type'=>'error']);
                }
            }
        } else {
            abort(403);
        }

    }

    public function storePrice(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest) {
            $date_string = explode("-", $request->effective_date);
            $year = $date_string[0];

            $check = RefPrice::find($request->id)
                        ? RefPrice::where([
                                        ['procurement_item_id', $request->procurement_item_id],
                                        ['procurement_type', 'DRUM'],
                                        ['effective_date', 'LIKE', $year.'%'],
                                        ['id', '<>', $request->id]
                                        ])->first()
                        : RefPrice::where([
                                        ['procurement_item_id', $request->procurement_item_id],
                                        ['procurement_type', 'DRUM'],
                                        ['effective_date', 'LIKE', $year.'%']
                                        ])->first();

            if ($check) {
                return response()->json(['message'=>'Already set the price of this item for '.$year.'!', 'type'=> 'info']);
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
                        'procurement_type' => "DRUM",
                        'price' => $request->price,
                        'effective_date' => $request->effective_date
                    ];

                    RefPrice::create($price);
                    return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
                }
                else {
                    return response()->json(['message'=>'Something went wrong','type'=>'error']);
                }
            }
        } else {
            abort(403);
        }

    }

}
