<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefYear;
use App\GlobalSystemSettings;
use Auth;
class YearsController extends Controller
{
    //
    function get_year(){

        $data["year"] = RefYear::where('status','ACTIVE')->get();
        $data["settings"] = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
        return view('components.global.system_set_up_year',['data' => $data]);
    }

    public function index() {
        $data = RefYear::paginate(10);
        return view('pages.reference.year.year',['year' => $data]);
    }

    public function getYear() {
        $data = RefYear::paginate(10);
        return view('pages.reference.year.table.display_year',['year'=> $data]);
    }

    public function getYearByPage(Request $request) {
        if($request->ajax()) {
            $data = RefYear::paginate(10);
            return view('pages.reference.year.table.display_year',['year'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getYearSearch(Request $request)
    {
        if($request->ajax()) {
            $query = $request->q;
            if($query != ''){
                $data = RefYear::where('year' ,'LIKE', '%'. $query .'%')->paginate(10);
            }else{
                $data = RefYear::paginate(10);
            }
            return view('pages.reference.year.table.display_year',['year'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm(){
        return view('pages.reference.year.form.add_year');
    }

    public function store(Request $request) {
        if($request->ajax()) {
            $check = RefYear::find($request->year_id)
                            ? RefYear::where('year', $request->year)->where('id', '<>', $request->year_id)->first()
                            : RefYear::where('year', $request->year)->first();

            if ($check) {
                return response()->json(['message'=>'Year '. $request->year .' already exists!', 'type'=> 'info']);
            } else {
                $check = RefYear::find($request->year_id);
                if ($check) {
                    $check->update(['year' => $request->year, 'status' => $request->status]);
                    return response()->json(['message'=>'Successfully updated data','type'=>'update']);
                }
                else if (empty($check)) {
                    RefYear::create($request->all());
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
