<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefBudgetLineItem extends Model
{
    //
    protected $table = "ref_budget_line_item";

    protected $fillable = ['id', 'fund_source_id', 'budget_item', 'year_id', 'allocation_amount', 
                            'if_conap', 'conap_year_id', 'saa_ctrl_number', 'purpose', 'status'];
}
