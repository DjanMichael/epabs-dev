<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefFunctionDeliverables extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = 'ref_function_deliverables';

    protected $fillable = ['id', 'class_sequence','function_class', 'status'];
}
