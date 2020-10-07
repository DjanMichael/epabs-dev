<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefFunctionDeliverables;

class FunctionDeliverablesController extends Controller
{
    //
    public function index(){ return view('pages.reference.deliverables.function_deliverables'); }

    public function getFunctionDeliverables()
    {
        $data = RefFunctionDeliverables::paginate(10);
        return view('pages.reference.deliverables.table.display_function_deliverables',['deliverables'=> $data]);
    }

    public function getFunctionDeliverablesByPage(Request $request){
        if($request->ajax())
        {
            $data = RefFunctionDeliverables::paginate(10);
            return view('pages.reference.deliverables.table.display_function_deliverables',['deliverables'=> $data]);
        }
    }

    public function getFunctionDeliverablesSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefFunctionDeliverables::where('class_sequence' ,'LIKE', '%'. $query .'%')
                                                    ->orWhere('function_class' ,'LIKE', '%'. $query .'%')
                                                    ->paginate(10);
            }else{
                $data = RefFunctionDeliverables::paginate(10);
            }
            return view('pages.reference.deliverables.table.display_function_deliverables',['deliverables'=> $data]);
        }
    }

    public function getAddForm(){
        return view('pages.reference.deliverables.form.add_function_deliverables');
    }

    public function store(Request $request) {

        $check = RefFunctionDeliverables::find($request->id)
                        ? RefFunctionDeliverables::where([
                                            ['function_class', $request->function_class],
                                            ['id', '<>', $request->id]
                                            ])->first()
                        : RefFunctionDeliverables::where([
                                            ['function_class', $request->function_class],
                                            ])->first();

        if ($check) {
            return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
        } else {
            $check = RefFunctionDeliverables::find($request->id);
            if ($check) {
                $check->update(['class_sequence' => $request->class_sequence, 'function_class' => $request->function_class,
                                'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                RefFunctionDeliverables::create($request->all());
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Something went wrong']);
            }
        }

    }
}
