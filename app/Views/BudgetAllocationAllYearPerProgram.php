<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class BudgetAllocationAllYearPerProgram extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "vw_get_all_programs_with_count_budget_per_year";
}
