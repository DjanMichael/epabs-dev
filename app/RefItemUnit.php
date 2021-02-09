<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefItemUnit extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "ref_item_unit";

    protected $fillable = ['id', 'unit_of_measure', 'unit_name', 'status'];
}
