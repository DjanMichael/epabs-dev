<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Views\ActivityList;

class ActivityCalendarController extends Controller
{
    //
    public function index(){
        $data['activity_list'] = ActivityList::where('is_catering', '=', 'Y')
                                            ->groupBy('pi_id')->get();
        $data['months'] = array(
                                "1" => "January",
                                "2" => "February",
                                "3" => "March",
                                "4" => "April",
                                "5" => "May",
                                "6" => "June",
                                "7" => "July",
                                "8" => "August",
                                "9" => "September",
                                "10" => "October",
                                "11" => "November",
                                "12" => "December"
                            );
        // return dd($data['activity_list']);
        return dd($data['activity_list'][0]['activity_timeframe']);
        // return view('pages.transaction.activity_calendar.activities_calendar', ['data'=> $data]);
    }

}
