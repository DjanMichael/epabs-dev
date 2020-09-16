<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableUnitBudgetAllocation extends Model
{
    //
    protected $table = 'tbl_unit_budget_allocation';

    public function unit(){
        return $this->belongsTo('App\UserProfile');
    }

    
}
