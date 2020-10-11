<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefItemUnit;

class ItemUnitController extends Controller
{
    //

    public function index(){ return view('pages.reference.itemunit.item_unit'); }

    public function getItemUnit()
    {
        $data = RefItemUnit::paginate(10);
        return view('pages.reference.itemunit.table.display_item_unit',['itemunit'=> $data]);
    }

    public function getItemUnitByPage(Request $request){
        if($request->ajax())
        {
            $data = RefItemUnit::paginate(10);
            return view('pages.reference.itemunit.table.display_item_unit',['itemunit'=> $data]);
        }
    }

    public function getItemUnitSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefItemUnit::where('unit_name' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('unit_of_measure' ,'LIKE', '%'. $query .'%')
                                        ->paginate(10);
            }else{
                $data = RefItemUnit::paginate(10);
            }
            return view('pages.reference.itemunit.table.display_item_unit',['itemunit'=> $data]);
        }
    }

    public function getAddForm(){
        return view('pages.reference.itemunit.form.add_item_unit');
    }

    public function store(Request $request) {

        $check = RefItemUnit::find($request->item_unit_id)
                        ? RefItemUnit::where([
                                            ['unit_name', $request->unit_name],
                                            ['id', '<>', $request->item_unit_id]
                                            ])->first()
                        : RefItemUnit::where([
                                            ['unit_name', $request->unit_name],
                                            ])->first();

        if ($check) {
            return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
        } else {
            $check = RefItemUnit::find($request->item_unit_id);
            if ($check) {
                $check->update(['unit_of_measure' => $request->unit_of_measure, 'unit_name' => $request->unit_name,
                                'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                RefItemUnit::create($request->all());
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Something went wrong']);
            }
        }

    }

}
