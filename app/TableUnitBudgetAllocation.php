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

    public function getSingleBudgetAllocationUtilization($unit_id, $year_id, $bli_id){
        $a = TableUnitBudgetAllocation::join('ref_budget_line_item','ref_budget_line_item.id','tbl_unit_budget_allocation.budget_line_item_id')
                                        ->join('ref_year','ref_year.id','tbl_unit_budget_allocation.year_id')
                                        ->selectRaw('CONCAT("Php ",FORMAT(program_budget,2)) as program_budget')
                                        ->where('tbl_unit_budget_allocation.unit_id',$unit_id)
                                        ->where('tbl_unit_budget_allocation.year_id',$year_id)
                                        ->where('tbl_unit_budget_allocation.budget_line_item_id',$bli_id)
                                        ->where('ref_budget_line_item.status','ACTIVE')
                                        ->get();
        $a["utilized_amount"] = TableUnitBudgetAllocation::join('ref_budget_line_item','ref_budget_line_item.id','tbl_unit_budget_allocation.budget_line_item_id')
                                        ->join('ref_year','ref_year.id','tbl_unit_budget_allocation.year_id')
                                        ->selectRaw('CONCAT("Php ",FORMAT(program_budget,2)) as program_budget')
                                        ->where('tbl_unit_budget_allocation.unit_id',$unit_id)
                                        ->where('tbl_unit_budget_allocation.year_id',$year_id)
                                        ->where('tbl_unit_budget_allocation.budget_line_item_id',$bli_id)
                                        ->where('ref_budget_line_item.status','ACTIVE')
                                        ->get();
                                        
        return ($a) ? $a->toArray() : null ;
    }
    
}
