<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefBudgetLineItem extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "ref_budget_line_item";

    protected $fillable = ['id', 'fund_source_id', 'budget_item', 'year_id', 'allocation_amount', 
                            'unit_program_id', 'saa_ctrl_number', 'purpose', 'status'];
}
