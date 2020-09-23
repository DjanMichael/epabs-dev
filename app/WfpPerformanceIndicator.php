<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WfpPerformanceIndicator extends Model
{
    protected $table = "tbl_wfp_activity_per_indicator";

    public function wfp(){
        return $this->belongsTo('App\Wfp');
    }
}
