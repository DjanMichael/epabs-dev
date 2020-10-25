<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OutputFunction;
use App\RefFunctionDeliverables;
use App\RefProgram;
use App\User;
use Auth;

class OutputFunctionController extends Controller
{
    //
    public function index(){ return view('pages.reference.outputfunction.output_function'); }

    public function fetchOutputFunction(){
        if (Auth::user()->role->roles == 'ADMINISTRATOR') {
            $data = OutputFunction::join('ref_function_deliverables', 'ref_function_deliverables.id', '=', 'tbl_activity_output_function.output_function_id')
                        ->join('ref_program', 'ref_program.id', '=', 'tbl_activity_output_function.program_id')
                        ->join('users', 'users.id', '=', 'tbl_activity_output_function.user_id')
                        ->select('tbl_activity_output_function.id as id', 'function_class', 'description', 'program_name', 'name')
                        ->orderBy('id', 'ASC')
                        ->paginate(10);
        } else {
            $data = OutputFunction::join('ref_function_deliverables', 'ref_function_deliverables.id', '=', 'tbl_activity_output_function.output_function_id')
                        ->join('ref_program', 'ref_program.id', '=', 'tbl_activity_output_function.program_id')
                        ->join('users', 'users.id', '=', 'tbl_activity_output_function.user_id')
                        ->select('tbl_activity_output_function.id as id', 'function_class', 'description', 'program_name', 'name')
                        ->where('users.id' ,'=', Auth::user()->id)
                        ->orderBy('id', 'ASC')
                        ->paginate(10);
        }
        return $data;
    }

    public function getOutputFunction(){
        // return dd($this->fetchOutputFunction());
        return view('pages.reference.outputfunction.table.display_output_function',['output_function'=> $this->fetchOutputFunction()]);
    }

    public function getOutputFunctionByPage(Request $request){
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest){
            return view('pages.reference.outputfunction.table.display_output_function',['output_function'=> $this->fetchOutputFunction()]);
        } else {
            abort(403);
        }
    }

    public function getOutputFunctionBySearch(Request $request) {
        $isAjaxRequest = $request->ajax();
        if($isAjaxRequest)
        {
            $query = $request->q;
            if($query != ''){
                $data = OutputFunction::leftJoin('ref_year', 'ref_year.id', '=', 'ref_budget_line_item.year_id')
                                        ->select('ref_budget_line_item.id', 'budget_item', 'year', 'allocation_amount', 'ref_budget_line_item.status')
                                        ->where('budget_item' ,'LIKE', '%'. $query .'%')
                                        ->paginate(10);
            }else{
                $data = $this->fetchOutputFunction();
            }
            return view('pages.reference.outputfunction.table.display_output_function',['output_function'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm(){
        $data['function_deliverables'] = RefFunctionDeliverables::where('status','ACTIVE')->get();
        $data['program'] = RefProgram::where('status','ACTIVE')->get();
        return view('pages.reference.outputfunction.form.add_output_function', ['data'=> $data]);
    }

    public function store(Request $request) {

        // $check = OutputFunction::find($request->id)
        //             ? OutputFunction::where([
        //                                     ['budget_item', $request->budget_item],
        //                                     ['year_id', $request->year_id],
        //                                     ['id', '<>', $request->id]
        //                                     ])->first()
        //             : OutputFunction::where([
        //                                     ['budget_item', $request->budget_item],
        //                                     ['year_id', $request->year_id],
        //                                     ])->first();

        // if ($check) {
        //     return response()->json(['message'=>'Budget Item '.$request->budget_item.' already have amount for year '.$request->year, 'type'=> 'info']);
        // } else {
            $check = OutputFunction::find($request->id);
            if ($check) {
                $check->update(['budget_item' => $request->budget_item,
                                'year_id' => $request->year_id,
                                'allocation_amount' => $request->amount,
                                'status' => $request->status]);
                return response()->json(['message'=>'Successfully updated data','type'=>'update']);
            }
            else if (empty($check)) {
                $output_function = [
                    'output_function_id' => $request->function_deliverables_id,
                    'description'        => $request->description,
                    'user_id'            => Auth::user()->id,
                    'program_id'         => $request->program_id
                ];
                OutputFunction::create($output_function);
                return response()->json(['message'=>'Successfully saved data','type'=>'insert']);
            }
            else {
                return response()->json(['message'=>'Something went wrong']);
            }
        // }

    }

}
