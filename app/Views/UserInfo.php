<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    protected $table = "vw_user_information";
}
