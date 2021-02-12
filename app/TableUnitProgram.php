<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableUnitProgram extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table ='tbl_unit_program';

    protected $fillable =['id', 'program_id', 'unit_id', 'user_id'];

}
