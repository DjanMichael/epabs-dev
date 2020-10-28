<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class GlobalSystemSettings extends Model
{
    //
    protected $table= "global_system_settings";

    public function getYearSelectedByUser(){
        $year = GlobalSystemSettings::join('')
                                ->where('user_id',Auth::user()->id)->first();
        $year = $year != null ? $year->select_year : null;
        return $year;
    }
}
