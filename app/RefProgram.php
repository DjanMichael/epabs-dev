<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefProgram extends Model
{
    //
    protected $table = "ref_program";

    protected $fillable = ['id', 'program_name', 'status'];

}
