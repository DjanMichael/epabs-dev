<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class ReportAppDetails extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table ="vw_report_app_details";
}
