<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WfpActivity extends Model
{
    protected $table = "tbl_wfp_activity";
    protected $cast = [
        'activity_cost' => 'float'
    ];
}
