<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TablePiCateringBatches extends Model
{
    //
    protected $table = "tbl_pi_catering_batches";
    protected $fillable = ['pi_id','batch_no','batch_location'];
}
