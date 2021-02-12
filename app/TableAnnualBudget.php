<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableAnnualBudget extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table ='tbl_annual_budget';

    protected $fillable =['id','year_id', 'available_budget', 'if_conap', 'conap_year_id', 'status'];

}
