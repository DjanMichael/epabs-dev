<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefYear;

class YearsController extends Controller
{
    //
    function get_year(){
       
        $data = RefYear::where('status','ACTIVE')->get();
        
        return view('components.global.system_set_up_year',['data' => $data]);
    }

    public function index(){
        
        return view('pages.reference.year.year');
 
    }
    
    public function getYear()
    {
        $data = RefYear::paginate(10);
        return view('pages.reference.year.table.display_year',['year'=> $data]);
    }

    public function getYearByPage(Request $request){
        if($request->ajax())
        {
            $data = RefYear::paginate(10);
            return view('pages.reference.year.table.display_year',['year'=> $data]);
        }
    }

    public function getYearSearch(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->q;
            if($query != ''){
                $data = RefYear::where('year' ,'LIKE', '%'. $query .'%')->paginate(10);
            }else{
                $data = RefYear::paginate(10);
            }
            return view('pages.reference.year.table.display_year',['year'=> $data]);
        }
    }  

    public function getAddForm(){
        return view('pages.reference.year.form.add_year');        
    }

    public function store(Request $request) {
        
        $check = RefYear::where('year', $request->all())->first();
        if ($check) {
            return response()->json(['message'=>'Data already exists!', 'type'=> 'info']);
        } else {
            $refYear = RefYear::create($request->all());
            if ($refYear) {
                return response()->json(['message'=>'Successfully inserted data','type'=>'insert']);
            } else {
                return response()->json(['message'=>'Something went wrong']);
            }
        }
        
    }
}
