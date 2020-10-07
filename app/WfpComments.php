<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WfpComments extends Model
{
    //
    protected $table="tbl_wfp_comments";
    protected $fillable =['wfp_code','user_id','comment'];
}
