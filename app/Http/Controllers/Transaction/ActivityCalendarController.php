<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityCalendarController extends Controller
{
    //
    public function index(){
        return view('pages.transaction.activity_calendar.activities_calendar');
    }

}
