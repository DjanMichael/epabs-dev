<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefUacs;

class UacsController extends Controller
{
    //
    public function index(){ return view('pages.reference.uacs.uacs'); }

    public function getUacs()
    {
        $data = RefUacs::paginate(10);
        return view('pages.reference.uacs.table.display_uacs',['uacs'=> $data]);
    }

    public function getUacsByPage(Request $request){
        if($request->ajax())
        {
            $data = RefUacs::paginate(10);
            return view('pages.reference.uacs.table.display_uacs',['uacs'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getUacsSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefUacs::where('category' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('subcategory' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('title' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('code' ,'LIKE', '%'. $query .'%')
                                        ->paginate(10);
            }else{
                $data = RefUacs::paginate(10);
            }
            return view('pages.reference.uacs.table.display_uacs',['uacs'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm(){
        return view('pages.reference.uacs.form.add_uacs');
    }

    public function store(Request $request) {

        if($request->ajax()) {
            $check = RefUacs::find($request->id)
                            ? RefUacs::where([
                                            ['category', $request->category],
                                            ['subcategory', $request->subcategory],
                                            ['title', $request->title],
                                            ['code', $request->code],
                                            ['id', '<>', $request->id]
                                            ])->first()
                            : RefUacs::where([
                                            ['category', $request->category],
                                            ['subcategory', $request->subcategory],
                                            ['title', $request->title],
                                            ['code', $request->code],
                                            ])->first();

            if ($check) {
                return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
            } else {
                $check = RefUacs::find($request->id);
                if ($check) {
                    $check->update(['category' => $request->category, 'subcategory' => $request->subcategory,
                                    'title' => $request->title, 'code' => $request->code,
                                    'status' => $request->status]);
                    return response()->json(['message'=>'Successfully updated data','type'=>'update']);
                }
                else if (empty($check)) {
                    RefUacs::create($request->all());
                    return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
                }
                else {
                    return response()->json(['message'=>'Sorry, looks like there are some errors detected, please try again.', 'type'=>'error']);
                }
            }
        } else {
            abort(403);
        }

    }
}
