<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class ProgramsWfpStatus extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table ="vw_programs_wfp_status";
}
