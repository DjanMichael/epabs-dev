<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPurchaseRequestDetails extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table='tbl_pr_details';
    protected $fillable =['wfp_code','wfp_act','pr_code','item_id','item_type','item_unit','item_description','item_classification','item_qty','item_price'];
}
