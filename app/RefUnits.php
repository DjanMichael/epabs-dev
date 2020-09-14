<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefUnits extends Model
{
    //
    protected $table ='ref_units';

    protected $fillable =['division','section'];
}
