<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramAop extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table="tbl_aop";
}
