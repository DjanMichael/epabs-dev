<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefUacs extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table ="ref_uacs";

    protected $fillable =['id', 'category','subcategory', 'title', 'code', 'status'];
}
