<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefActivityCategory extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table='ref_activity_category';

    protected $fillable = ['id', 'category', 'status'];

    public function getAll()
    {
        $result = RefActivityCategory::all()->toArray();
        return $result;
    }
}
