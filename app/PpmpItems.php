<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PpmpItems extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "tbl_ppmp_items";
    protected $fillable = ["wfp_act_per_indicator_id","item_id","price","jan","feb","mar","apr","may","june","july","aug","sept","oct","nov","dec"];
}
