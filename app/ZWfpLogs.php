<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZWfpLogs extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table = "z_wfp_logs";
}
