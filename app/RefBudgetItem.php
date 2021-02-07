<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefBudgetItem extends Model
{
    //
    protected $table = "ref_budget_item";

    protected $fillable = ['id', 'budget_item', 'status'];
}
