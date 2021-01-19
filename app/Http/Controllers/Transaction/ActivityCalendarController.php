<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Views\ActivityList;
use App\GlobalSystemSettings;
use App\RefYear;
use Auth;

class ActivityCalendarController extends Controller
{
    public function index(){ return view('pages.transaction.activity_calendar.activities_calendar'); }

    public function getList() {
        $settings = GlobalSystemSettings::where('user_id',Auth::user()->id)->first();
        if ($settings) {

            $data['activity_list'] = ActivityList::where('is_catering', '=', 'Y')
                                                    ->where('program_id', $settings->select_program_id)
                                                    ->where('year_id', $settings->select_year)
                                                    ->get()->toArray();
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

            $selected_months_array = [];
            $arr = [];

            for ($i = 0; $i < count($data['activity_list']); $i++) {
                $split = explode(",", $data['activity_list'][$i]["activity_timeframe"]);
                foreach($split as $key => $value) {
                    if ($value == "Y") {
                        if ($key == "0" && $value == "Y") {
                            $value = "January";
                        }
                        else if ($key == "1" && $value == "Y") {
                            $value = "February";
                        }
                        else if ($key == "2" && $value == "Y") {
                            $value = "March";
                        }
                        else if ($key == "3" && $value == "Y") {
                            $value = "April";
                        }
                        else if ($key == "4" && $value == "Y") {
                            $value = "May";
                        }
                        else if ($key == "5" && $value == "Y") {
                            $value = "June";
                        }
                        else if ($key == "6" && $value == "Y") {
                            $value = "July";
                        }
                        else if ($key == "7" && $value == "Y") {
                            $value = "August";
                        }
                        else if ($key == "8" && $value == "Y") {
                            $value = "September";
                        }
                        else if ($key == "9" && $value == "Y") {
                            $value = "October";
                        }
                        else if ($key == "10" && $value == "Y") {
                            $value = "November";
                        }
                        else if ($key == "11" && $value == "Y") {
                            $value = "December";
                        }

                    $arr = array("code" => $data['activity_list'][$i]["code"],
                                "user_id" => $data['activity_list'][$i]["user_id"],
                                "program_id" => $data['activity_list'][$i]["program_id"],
                                "program_name" => $data['activity_list'][$i]["program_name"],
                                "year_id" => $data['activity_list'][$i]["year_id"],
                                "year" => $data['activity_list'][$i]["year"],
                                "wfp_act_id" => $data['activity_list'][$i]["wfp_act_id"],
                                "out_function" => $data['activity_list'][$i]["out_function"],
                                "out_activity" => $data['activity_list'][$i]["out_activity"],
                                "responsible_person" => $data['activity_list'][$i]["responsible_person"],
                                "activity_timeframe" => $value,
                                "target_q1" => $data['activity_list'][$i]["target_q1"],
                                "target_q2" => $data['activity_list'][$i]["target_q2"],
                                "target_q3" => $data['activity_list'][$i]["target_q3"],
                                "target_q4" => $data['activity_list'][$i]["target_q4"],
                                "activity_cost" => $data['activity_list'][$i]["activity_cost"],
                                "performance_indicator" => $data['activity_list'][$i]["performance_indicator"],
                                "is_catering" => $data['activity_list'][$i]["is_catering"],
                                "batch" => $data['activity_list'][$i]["batch"]);
                    array_push($selected_months_array, $arr);
                    }
                }
            }
            $data['activity_list'] = $selected_months_array;
            $result = RefYear::select('year')->where('id', '=', $settings->select_year)->first();
            $data['year'] = $result['year'];
            return view('pages.transaction.activity_calendar.panel', ['data'=> $data]);

        } else {
            $data['year'] = "NO YEAR SELECTED";
            return ['data'=> $data];
        }

    }

}
