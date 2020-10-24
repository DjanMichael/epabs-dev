<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefDMCategory;

class DrugMedicineCategoryController extends Controller
{
    //
    public function index(){ return view('pages.reference.dmcategory.drug_medicine_category'); }

    public function getCategory()
    {
        $data = RefDMCategory::paginate(10);
        return view('pages.reference.dmcategory.table.display_drug_medicine_category',['category'=> $data]);
    }

    public function getCategoryByPage(Request $request){
        if($request->ajax())
        {
            $data = RefDMCategory::paginate(10);
            return view('pages.reference.dmcategory.table.display_drug_medicine_category',['category'=> $data]);
        }
    }

    public function getCategorySearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefDMCategory::where('category' ,'LIKE', '%'. $query .'%')->paginate(10);
            }else{
                $data = RefDMCategory::paginate(10);
            }
            return view('pages.reference.dmcategory.table.display_drug_medicine_category',['category'=> $data]);
        }
    }

    public function getAddForm(){
        return view('pages.reference.dmcategory.form.add_drug_medicine_category');
    }

    public function store(Request $request) {

        $check = RefDMCategory::find($request->id)
                    ? RefDMCategory::where('category', $request->category)->where('id', '<>', $request->id)->first()
                    : RefDMCategory::where('category', $request->category)->first();

        if ($check) {
            return response()->json(['message'=>'Category '.$request->category.' already exists!', 'type'=> 'info']);
        } else {
            $check = RefDMCategory::find($request->id);
            if ($check) {
                $check->update(['category' => $request->category, 'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                RefDMCategory::create($request->all());
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Sorry, looks like there are some errors detected, please try again.', 'type'=>'error']);
            }
        }

    }

}
