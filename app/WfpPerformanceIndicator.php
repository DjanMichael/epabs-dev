<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WfpPerformanceIndicator extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table = "tbl_wfp_activity_per_indicator";
    protected $fillable = ['wfp_code','uacs_id','bli_id','performance_indicator','cost','is_ppmp','batch','batch'];
}
