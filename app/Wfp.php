<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wfp extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table = "tbl_wfp";
}
