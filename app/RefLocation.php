<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefLocation extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "ref_location";

    protected $fillable = ['id', 'region', 'province', 'city', 'outside', 'status'];
}
