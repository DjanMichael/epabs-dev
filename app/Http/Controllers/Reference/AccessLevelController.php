<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccessLevel;

class AccessLevelController extends Controller
{
    //
    public function index(){ return view('pages.reference.access_level.access_level'); }

    public function getAccessLevel(){
        $data['level'] = AccessLevel::select('access_level')->distinct()->get();
        $data['module'] = AccessLevel::select('module')->distinct()->get();
        return view('pages.reference.access_level.display_access_level',['data'=> $data]);
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
            return response()->json(['message'=>'Classification '.$request->classification.' already exists!', 'type'=> 'info']);
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
                return response()->json(['message'=>'Sorry, looks like there are some errors detected, please try again.', 'type'=>'error']);
            }
        }

    }

}
