<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YearsController extends Controller
{
    //
    function get_year(){
       
        $data = \App\RefYear::where('status','ACTIVE')->get();
        
        return view('components.global.system_set_up_year',['data' => $data]);
    }
}
