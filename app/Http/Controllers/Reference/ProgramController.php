<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefProgram;

class ProgramController extends Controller
{
    //
    public function index(){ return view('pages.reference.program.program'); }

    public function getProgram()
    {
        $data = RefProgram::paginate(10);
        return view('pages.reference.program.table.display_program',['program'=> $data]);
    }

    public function getProgramByPage(Request $request){
        if($request->ajax()) {
            $data = RefProgram::paginate(10);
            return view('pages.reference.program.table.display_program',['program'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getProgramSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefProgram::where('program_name' ,'LIKE', '%'. $query .'%')->paginate(10);
            }else{
                $data = RefProgram::paginate(10);
            }
            return view('pages.reference.program.table.display_program',['program'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm(){
        return view('pages.reference.program.form.add_program');
    }

    public function store(Request $request) {

        if($request->ajax()) {
            $check = RefProgram::find($request->id)
                            ? RefProgram::where('program_name', $request->program_name)->where('id', '<>', $request->id)->first()
                            : RefProgram::where('program_name', $request->program_name)->first();

            if ($check) {
                return response()->json(['message'=>'Program '.$request->program_name.' already exist in the database!', 'type'=> 'info']);
            } else {
                $check = RefProgram::find($request->id);
                if ($check) {
                    $check->update(['program_name' => $request->program_name, 'status' => $request->status]);
                    return response()->json(['message'=>'Successfully updated data','type'=>'update']);
                }
                else if (empty($check)) {
                    RefProgram::create($request->all());
                    return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
                }
                else {
                    return response()->json(['message'=>'Sorry, looks like there are some errors detected, please try again.']);
                }
            }
        } else {
            abort(403);
        }

    }
}
