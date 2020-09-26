<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableProcurementSupplies extends Model
{
    protected $table ='tbl_procurement_supplies';

    protected $fillable =['id','description', 'unit_id', 'classification_id', 'price', 'status', 'fix_price'];

}
