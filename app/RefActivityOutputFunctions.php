<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefActivityOutputFunctions extends Model
{
    //
    protected $table ="tbl_activity_output_function";
    protected $fillable =["output_function_id","function_description","user_id","program_id"];
}
