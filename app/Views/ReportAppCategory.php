<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class ReportAppCategory extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table ="vw_report_app_category";
}
