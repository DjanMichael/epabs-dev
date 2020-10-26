<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefProgram;
use App\RefUnits;
use App\User;
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
                    ? UnitProgram::paginate(10)
                    : UnitProgram::where('user_id', '=', Auth::user()->id)->paginate(10);
        return view('pages.reference.unitprogram.table.display_unit_program',['unit_program'=> $data]);
    }

    public function getUnitProgramByPage(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest)
        {
            $userRole = Auth::user()->role->roles;
            $data = ($userRole == 'ADMINISTRATOR')
                        ? UnitProgram::paginate(10)
                        : UnitProgram::where('user_id', '=', Auth::user()->id)->paginate(10);
            return view('pages.reference.unitprogram.table.display_unit_program',['unit_program'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getUnitProgramBySearch(Request $request){
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
                                        ->paginate(10)
                        : UnitProgram::where('user_id', '=', Auth::user()->id)
                                        ->where('program_name' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('division' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('section' ,'LIKE', '%'. $query .'%')
                                        ->orWhere('name' ,'LIKE', '%'. $query .'%')
                                        ->paginate(10);
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

    public function getAddForm(){
        $data['program'] = RefProgram::where('status','ACTIVE')
                                        ->whereNotIn('id', TableUnitProgram::select('program_id')->get()->toArray())
                                        ->get();
        // $data['unit'] = RefUnits::where('status','ACTIVE')->where('id', '<>', '1')->get();
        $data['coordinator'] = User::where('id', '<>', '1')->get();
        return view('pages.reference.unitprogram.form.add_unit_program', ['data'=> $data]);
    }

    public function store(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest) {
            $check = TableUnitProgram::find($request->id)
                    ? TableUnitProgram::where('program_id', $request->program_id)
                                        ->where('user_id', $request->user_id)
                                        ->where('id', '<>', $request->id)
                                        ->first()
                    : TableUnitProgram::where('program_id', $request->program_id)
                                        ->where('user_id', $request->user_id)
                                        ->first();

            if ($check) {
                return response()->json(['message'=>'Coordinator'.$request->user.' is already assigned to the program '.$request->program.'!', 'type'=> 'info']);
            } else {
                $check = TableUnitProgram::find($request->id);
                if ($check) {
                    $check->update(['program_id' => $request->program_id, 'user_id' => $request->user_id]);
                    return response()->json(['message'=>'Successfully updated data','type'=>'update']);
                }
                else if (empty($check)) {
                    $unit_program = [
                        'program_id' => $request->program_id,
                        'unit_id' => Auth::user()->getUnitId(),
                        'user_id' => $request->user_id
                    ];

                    TableUnitProgram::create($unit_program);
                    return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
                }
                else {
                    return response()->json(['message'=>'Something went wrong']);
                }
            }
        } else {
            abort(403);
        }

    }


}
