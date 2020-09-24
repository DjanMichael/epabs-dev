<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblWfpActivityPerIndicator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_wfp_activity_per_indicator', function (Blueprint $table) {
            $table->id();
            $table->integer('uacs_id');
            $table->integer('bli_id');
            $table->string('performance_indicator');
            $table->decimal('cost',10,2);
            $table->enum('is_ppmp',['Y','N']);
            $table->enum('is_catering',['Y','N']);
            $table->string('batch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_wfp_activity_per_indicator');
    }
}
