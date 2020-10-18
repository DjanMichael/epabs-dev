<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefUnits;

class OfficeUnitController extends Controller
{
    //
    public function index(){ return view('pages.reference.officeunit.office_unit'); }

    public function getOfficeUnit()
    {
        $data = RefUnits::paginate(10);
        return view('pages.reference.officeunit.table.display_office_unit',['officeunit'=> $data]);
    }

    public function getOfficeUnitByPage(Request $request){
        if($request->ajax())
        {
            $data = RefUnits::paginate(10);
            return view('pages.reference.officeunit.table.display_office_unit',['officeunit'=> $data]);
        }
    }

    public function getOfficeUnitSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefUnits::where('division' ,'LIKE', '%'. $query .'%')
                                    ->orWhere('section' ,'LIKE', '%'. $query .'%')
                                    ->paginate(10);
            }else{
                $data = RefUnits::paginate(10);
            }
            return view('pages.reference.officeunit.table.display_office_unit',['officeunit'=> $data]);
        }
    }

    public function getAddForm(){
        return view('pages.reference.officeunit.form.add_office_unit');
    }

    public function store(Request $request) {

        $check = RefUnits::find($request->id)
                        ? RefUnits::where([
                                            ['division', $request->division],
                                            ['section', $request->section],
                                            ['id', '<>', $request->id]
                                            ])->first()
                        : RefUnits::where([
                                            ['division', $request->division],
                                            ['section', $request->section],
                                            ])->first();

        if ($check) {
            return response()->json(['message'=>$request->division.'-'.$request->section.' already exists!', 'type'=> 'info']);
        } else {
            $check = RefUnits::find($request->id);
            if ($check) {
                $check->update(['division' => $request->division, 'section' => $request->section,
                                'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                RefUnits::create($request->all());
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Sorry, looks like there are some errors detected, please try again.', 'type'=>'error']);
            }
        }

    }

}
