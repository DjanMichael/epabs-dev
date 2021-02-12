<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PpmpComments extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table = "tbl_ppmp_comments";
    protected $fillable = ['wfp_code','user_id','comment'];
}
