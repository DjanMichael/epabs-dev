<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWfpActivityPerIndicator extends Migration
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
            $table->string('wfp_code');
            $table->string('wfp_act_id',20)->nullable();
            $table->string('uacs_id',20)->nullable();
            $table->integer('bli_id')->nullable();
            $table->string('performance_indicator')->nullable();
            $table->decimal('cost',20,2)->nullable();
            $table->enum('is_ppmp',['Y','N'])->nullable();
            $table->enum('is_catering',['Y','N'])->nullable();
            $table->string('batch')->nullable();
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
