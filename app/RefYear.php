<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefYear extends Model
{
    //
    protected $table = 'ref_year';

    protected $fillable = ['id', 'year', 'status'];
}
