<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Views\BudgetAllocationUtilization;

class TableUnitBudgetAllocation extends Model
{
    //
    protected $table = 'tbl_unit_budget_allocation';

    public function unit(){
        return $this->belongsTo('App\UserProfile');
    }

    public function getSingleBudgetAllocationUtilization($unit_id, $year_id, $bli_id){
        $a = BudgetAllocationUtilization::where('unit_id',$unit_id)
                                        ->where('year_id',$year_id)
                                        ->where('bli_id',$bli_id)
                                        ->get();
        return ($a) ? response()->json($a) : 0 ;
    }
    
}
