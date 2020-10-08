<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefClassification;

class ClassificationController extends Controller
{
    //
    public function index(){

        return view('pages.reference.classification.classification');

    }

    public function getClassification()
    {
        $data = RefClassification::paginate(10);
        return view('pages.reference.classification.table.display_classification',['classification'=> $data]);
    }

    public function getClassificationByPage(Request $request){
        if($request->ajax())
        {
            $data = RefClassification::paginate(10);
            return view('pages.reference.classification.table.display_classification',['classification'=> $data]);
        }
    }

    public function getClassificationSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefClassification::where('classification' ,'LIKE', '%'. $query .'%')->paginate(10);
            }else{
                $data = RefClassification::paginate(10);
            }
            return view('pages.reference.classification.table.display_classification',['classification'=> $data]);
        }
    }

    public function getAddForm(){
        return view('pages.reference.classification.form.add_classification');
    }

    public function store(Request $request) {

        $check = RefClassification::find($request->classification_id)
                        ? RefClassification::where('classification', $request->classification)->where('id', '<>', $request->classification_id)->first()
                        : RefClassification::where('classification', $request->classification)->first();

        if ($check) {
            return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
        } else {
            $check = RefClassification::find($request->classification_id);
            if ($check) {
                $check->update(['classification' => $request->classification, 'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                RefClassification::create($request->all());
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Something went wrong']);
            }
        }

    }

}
