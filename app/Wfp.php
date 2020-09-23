<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wfp extends Model
{
    //
    protected $table = "tbl_wfp_activity";


    public function performanceIndicators()
    {
        return $this->hasMany('App\WfpPerformanceIndicator','wfp_id','id');
    }
}
