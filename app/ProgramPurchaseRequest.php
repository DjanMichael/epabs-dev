<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPurchaseRequest extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table="tbl_pr";
}
