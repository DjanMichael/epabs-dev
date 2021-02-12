<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class BudgetExpenseClass extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table="vw_budget_expense_class";
}
