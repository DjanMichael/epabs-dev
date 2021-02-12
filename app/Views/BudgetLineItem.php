<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class BudgetLineItem extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "vw_budget_line_item";
}
