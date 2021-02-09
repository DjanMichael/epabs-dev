<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class WfpListByProgram extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table="vw_unit_program_wfplist";
}
