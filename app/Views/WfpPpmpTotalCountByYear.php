<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class WfpPpmpTotalCountByYear extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table ="vw_total_wfp_ppmp_by_year";
}
