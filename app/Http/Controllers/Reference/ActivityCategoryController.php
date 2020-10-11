<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefActivityCategory;

class ActivityCategoryController extends Controller
{
    //
    public function index(){ return view('pages.reference.category.activity_category'); }

    public function getActivityCategory()
    {
        $data = RefActivityCategory::paginate(10);
        return view('pages.reference.category.table.display_activity_category',['category'=> $data]);
    }

    public function getActivityCategoryByPage(Request $request){
        if($request->ajax())
        {
            $data = RefActivityCategory::paginate(10);
            return view('pages.reference.category.table.display_activity_category',['category'=> $data]);
        }
    }

    public function getActivityCategorySearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefActivityCategory::where('category' ,'LIKE', '%'. $query .'%')->paginate(10);
            }else{
                $data = RefActivityCategory::paginate(10);
            }
            return view('pages.reference.category.table.display_activity_category',['category'=> $data]);
        }
    }

    public function getAddForm(){
        return view('pages.reference.category.form.add_activity_category');
    }

    public function store(Request $request) {

        $check = RefActivityCategory::find($request->category_id)
                        ? RefActivityCategory::where('category', $request->category)->where('id', '<>', $request->category_id)->first()
                        : RefActivityCategory::where('category', $request->category)->first();

        if ($check) {
            return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
        } else {
            $check = RefActivityCategory::find($request->category_id);
            if ($check) {
                $check->update(['category' => $request->category, 'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                RefActivityCategory::create($request->all());
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Something went wrong']);
            }
        }

    }
}
