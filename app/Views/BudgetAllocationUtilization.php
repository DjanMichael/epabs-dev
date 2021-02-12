<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class BudgetAllocationUtilization extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table = 'vw_unit_budget_allocation_utilization';
    // protected $table = 'vw_budget_line_item_program_budget';
    protected $casts = [
        'balance_plan'  =>  'float'
    ];
}
