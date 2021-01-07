<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableProcurementMedicine extends Model
{
    //
    protected $table ='tbl_procurement_medicine';

    protected $fillable =['id','description','strength', 'unit_id', 'classification_id', 'category_id', 'price', 'status', 'fix_price'];

}
