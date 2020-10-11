<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefClassification extends Model
{
    //
    protected $table = "ref_classification";

    protected $fillable = ['id', 'classification', 'status'];
}
