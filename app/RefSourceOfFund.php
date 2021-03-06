<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefSourceOfFund extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = 'ref_source_of_fund';

    protected $fillable = ['id', 'sof_classification', 'status'];


    public function getAll()
    {
        $result = RefSourceOfFund::all()->toArray();
        return $result;
    }
}
