<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class ReportWFPBLI extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table = "vw_report_wfp_bli";
}
