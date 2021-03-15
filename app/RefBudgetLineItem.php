<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefBudgetLineItem extends Model
{
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "ref_budget_line_item";

    protected $fillable = ['id', 'fund_source_id', 'budget_item', 'program_id', 'unit_id', 'year_id',
                            'allocation_amount', 'saa_ctrl_number', 'purpose', 'status'];
}
