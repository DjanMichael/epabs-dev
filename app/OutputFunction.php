<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutputFunction extends Model
{
    //
    protected $table='tbl_activity_output_function';

    protected $fillable = ['id', 'output_function_id', 'description', 'user_id', 'program_id', 'status'];

}
