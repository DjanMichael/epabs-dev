<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableSystemEvents extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "tbl_event_logs";
    protected $fillable = ['from_user_id','to_user_id','icon','icon_level','notif_type','event_name','event_title','event_description','isRead'];
}
