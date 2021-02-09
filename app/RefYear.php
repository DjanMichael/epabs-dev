<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefYear extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = 'ref_year';

    protected $fillable = ['id', 'year', 'status'];
}
