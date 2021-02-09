<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WfpActivity extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table = "tbl_wfp_activity";
    protected $cast = [
        'activity_cost' => 'float'
    ];
}
