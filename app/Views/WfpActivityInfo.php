<?php

namespace App\Views;

use Illuminate\Database\Eloquent\Model;
use App\RefActivityOutputFunctions;
class WfpActivityInfo extends Model
{ 
use \Spiritix\LadaCache\Database\LadaCacheTrait;
    //
    protected $table = "vw_wfp_activity_information";

    public function getOutputFunctionById($id){
            if($id != null ){
                $a = RefActivityOutputFunctions::where('id',$id)->first();
                return $a->description;
            }else{
                return '';
            }
    }
}
