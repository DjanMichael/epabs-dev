<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramConap extends Model
{
    //
    protected $table ="tbl_program_conap";
    protected $fillable = ['program_id','year_id','bli_distribution','amount'];
}
