<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefProgram;
use App\RefUnits;
use App\User;
use App\UserProfile;
use App\TableUnitProgram;
use App\Views\UnitProgram;
use Auth;

class UnitProgramController extends Controller
{
    //
    public function index(){ return view('pages.reference.unitprogram.unit_program'); }

    public function getUnitProgram(){
        $userRole = Auth::user()->role->roles;
        $data = ($userRole == 'ADMINISTRATOR')
                    ? UnitProgram::orderBy('id', 'ASC')->paginate(10)
                    : UnitProgram::where('user_id', '=', Auth::user()->id)->orderBy('id', 'ASC')->paginate(10);
        return view('pages.reference.unitprogram.table.display_unit_program',['unit_program'=> $data]);
    }

    public function getUnitProgramByPage(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest)
        {
            $userRole = Auth::user()->role->roles;
            $data = ($userRole == 'ADMINISTRATOR')
                        ? UnitProgram::orderBy('id', 'ASC')->paginate(10)
                        : UnitProgram::where('user_id', '=', Auth::user()->id)->orderBy('id', 'ASC')->paginate(10);
            return view('pages.reference.unitprogram.table.display_unit_program',['unit_program'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getUnitProgramBySearch(Request $request) {
        $userRole = Auth::user()->role->roles;
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest)
        {
            $query = $request->q;
            if($query != ''){
                $data = ($userRole == 'ADMINISTRATOR')
                        ? UnitProgram::where('program_name' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('division' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('section' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('name' ,'LIKE', '%'. $query .'%')
                                        ->orderBy('id', 'ASC')->paginate(10)
                        : UnitProgram::where('user_id', '=', Auth::user()->id)
                                        ->where('program_name' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('division' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('section' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('name' ,'LIKE', '%'. $query .'%')
                                        ->orderBy('id', 'ASC')->paginate(10);
            } else {
                $data = ($userRole == 'ADMINISTRATOR')
                        ? UnitProgram::paginate(10)
                        : UnitProgram::where('user_id', '=', Auth::user()->id)->paginate(10);
            }
            return view('pages.reference.unitprogram.table.display_unit_program',['unit_program'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm() {
        $data['program'] = RefProgram::where('status','ACTIVE')
                                        ->whereNotIn('id', TableUnitProgram::select('program_id')->get()->toArray())
                                        ->orderBy('program_name', 'ASC')
                                        ->get();
        // $data['unit'] = RefUnits::where('status','ACTIVE')->where('id', '<>', '1')->get();
        $data['coordinator'] = User::where('id', '<>', '1')->orderBy('name', 'ASC')->get();
        return view('pages.reference.unitprogram.form.add_unit_program', ['data'=> $data]);
    }

    public function store(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest) {
            $user = UserProfile::where('user_id', '=', $request->user_id)->first();
            try {
                $unit_program = [
                    'program_id' => $request->program_id,
                    'unit_id' => $user->unit_id,
                    'user_id' => $request->user_id
                ];

                TableUnitProgram::create($unit_program);
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);

            } catch (\Illuminate\Database\QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                return response()->json(['message'=>'Something went wrong', 'type'=>'error']);
            }

        } else {
            abort(403);
        }

    }

    public function removeAssignment(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest){
            try {
                $check = TableUnitProgram::find($request->id);
                if ($check) {
                    $check->delete();
                    return response()->json(['message'=>'Successfully remove assigned user','type'=>'delete']);
                } else {
                    return response()->json(['message'=>'Sorry, looks like there are some errors detected, please try again.', 'type'=>'error']);
                }
            } catch (\Illuminate\Database\QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                return response()->json(['message'=>'Something went wrong', 'type'=>'error']);
            }
        } else {
            abort(403);
        }

    }


}
