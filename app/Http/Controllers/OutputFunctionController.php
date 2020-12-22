<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Views\UnitProgram;
use App\Views\ActivityOutputFunction;
use App\OutputFunction;
use App\RefFunctionDeliverables;
use Auth;

class OutputFunctionController extends Controller
{
    //
    public function index(){ return view('pages.reference.output_function.output_function'); }

    public function fetchOutputFunction() {
        $data = (Auth::user()->role->roles == 'ADMINISTRATOR')
                    ? ActivityOutputFunction::orderBy('id', 'ASC')->paginate(10)
                    : ActivityOutputFunction::where('user_id' ,'=', Auth::user()->id)
                                                ->orderBy('id', 'ASC')->paginate(10);
        return $data;
    }

    public function getOutputFunction() {
        return view('pages.reference.output_function.table.display_output_function',['output_function'=> $this->fetchOutputFunction()]);
    }

    public function getOutputFunctionByPage(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest){
            return view('pages.reference.output_function.table.display_output_function',['output_function'=> $this->fetchOutputFunction()]);
        } else {
            abort(403);
        }
    }

    public function getOutputFunctionBySearch(Request $request) {
        $userRole = Auth::user()->role->roles;
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest)
        {
            $query = $request->q;
            if($query != ''){
                $data = ($userRole == 'ADMINISTRATOR')
                            ? ActivityOutputFunction::where('description', 'LIKE', '%'. $query .'%')
                                                    ->orWhere('function_class' ,'LIKE', '%'. $query .'%')
                                                    ->orWhere('program_name' ,'LIKE', '%'. $query .'%')
                                                    ->orderBy('id', 'ASC')
                                                    ->paginate(10)
                            : ActivityOutputFunction::where('user_id' ,'=', Auth::user()->id)
                                                    ->where(function ($sql) use ($query) {
                                                        $sql->where('description', 'LIKE', '%'. $query .'%')
                                                            ->orWhere('function_class' ,'LIKE', '%'. $query .'%')
                                                            ->orWhere('program_name' ,'LIKE', '%'. $query .'%');
                                                    })
                                                    ->orderBy('id', 'ASC')
                                                    ->paginate(10);
            } else {
                $data = $this->fetchOutputFunction();
            }
            return view('pages.reference.output_function.table.display_output_function',['output_function'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm(){
        $data['function_deliverables'] = RefFunctionDeliverables::where('status','ACTIVE')->get();
        $data['program'] = UnitProgram::where('user_id', '=', Auth::user()->id)->where('program_status','ACTIVE')->get();
        return view('pages.reference.output_function.form.add_output_function', ['data'=> $data]);
    }

    public function store(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest) {

            $check = OutputFunction::find($request->id);
            if ($check) {
                $check->update(['output_function_id' => $request->function_deliverables_id,
                                'description' => $request->description,
                                'user_id' => Auth::user()->id,
                                'program_id' => $request->program_id,
                                'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                $output_function = [
                    'output_function_id' => $request->function_deliverables_id,
                    'description'        => $request->description,
                    'user_id'            => Auth::user()->id,
                    'program_id'         => $request->program_id,
                    'status'             => $request->status
                ];
                OutputFunction::create($output_function);
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Something went wrong']);
            }
        } else {
            abort(403);
        }

    }

}
