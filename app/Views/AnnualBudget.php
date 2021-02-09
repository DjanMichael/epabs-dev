<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class AnnualBudget extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //

    protected $table = "vw_annual_budget";
}
