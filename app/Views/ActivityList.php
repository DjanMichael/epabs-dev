<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class ActivityList extends Model
{ 
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table = "vw_activity_list";
}
