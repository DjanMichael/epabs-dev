<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefSourceOfFund extends Model
{
    //
    protected $table = 'ref_source_of_fund';

    protected $fillable = ['sof_classification','status'];


    public function getAll()
    {
        $result = RefSourceOfFund::all()->toArray();
        return $result;
    }
}
