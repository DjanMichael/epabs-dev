<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefBudgetLineItem extends Model
{
    //
    protected $table = "ref_budget_line_item";

    protected $fillable = ['id', 'budget_item', 'year_id', 'allocation_amount', 'status'];
}
