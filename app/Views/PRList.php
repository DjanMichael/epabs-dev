<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class PRList extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table = "vw_pr_list";
}
