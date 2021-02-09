<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class UnitProgram extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "vw_unit_program";
}
