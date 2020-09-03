<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefUnit extends Model
{
    //
    protected $table ='ref_units';

    protected $fillable =['division','section'];
}
