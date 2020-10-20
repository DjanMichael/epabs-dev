<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefDmCategory extends Model
{
    //
    protected $table = "ref_dm_category";

    protected $fillable = ['id', 'category', 'status'];
}
