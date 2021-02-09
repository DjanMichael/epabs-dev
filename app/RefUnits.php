<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefUnits extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table ='ref_units';

    protected $fillable =['id', 'division', 'section', 'status'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
