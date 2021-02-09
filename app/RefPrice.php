<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefPrice extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "ref_price";

    protected $fillable = ['id', 'procurement_item_id', 'procurement_type', 'price', 'effective_date'];
}
