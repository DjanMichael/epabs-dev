<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefSourceOfFund;

class SourceOfFundController extends Controller
{

    public function index(){ return view('pages.reference.fund_source.source_of_funds'); }

    public function getFundSource()
    {
        $data = RefSourceOfFund::paginate(10);
        return view('pages.reference.fund_source.table.display_source_of_funds',['sof'=> $data]);
    }

    public function getFundSourceByPage(Request $request){
        if($request->ajax())
        {
            $data = RefSourceOfFund::paginate(10);
            return view('pages.reference.fund_source.table.display_source_of_funds',['sof'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getFundSourceSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            $data = $query != ''
                        ? RefSourceOfFund::where('sof_classification' ,'LIKE', '%'. $query .'%')->paginate(10)
                        : $data = RefSourceOfFund::paginate(10);

            return view('pages.reference.fund_source.table.display_source_of_funds',['sof'=> $data]);
        } else {
            abort(403);
        }
    }

    public function getAddForm(){
        return view('pages.reference.fund_source.form.add_source_of_funds');
    }

    public function store(Request $request) {

        if($request->ajax()) {
            $check = RefSourceOfFund::find($request->sof_id)
                            ? RefSourceOfFund::where('sof_classification', $request->sof_classification)->where('id', '<>', $request->sof_id)->first()
                            : RefSourceOfFund::where('sof_classification', $request->sof_classification)->first();

            if ($check) {
                return response()->json(['message'=>'Fund Source '.$request->sof_classification.' already exists!', 'type'=> 'info']);
            } else {
                $check = RefSourceOfFund::find($request->sof_id);
                if ($check) {
                    $check->update(['sof_classification' => $request->sof_classification, 'status' => $request->status]);
                    return response()->json(['message'=>'Successfully updated data','type'=>'update']);
                }
                else if (empty($check)) {
                    $refYear = RefSourceOfFund::create($request->all());
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
