<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefClassification extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "ref_classification";

    protected $fillable = ['id', 'classification', 'status'];
}
