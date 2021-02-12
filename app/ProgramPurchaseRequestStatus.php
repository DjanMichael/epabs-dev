<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPurchaseRequestStatus extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table ="tbl_pr_status";
}
