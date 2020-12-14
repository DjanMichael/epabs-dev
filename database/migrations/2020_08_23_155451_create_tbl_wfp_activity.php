<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWfpActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_wfp_activity', function (Blueprint $table) {
            $table->id();
            $table->string('wfp_code');
            $table->integer('out_function')->nullable();
            //$table->foreign('out_function')->references('id')->on('tbl_activity_output_function');
            $table->string('out_activity')->nullable();
            $table->integer('activity_category_id')->nullable();
            $table->integer('activity_source_of_fund')->nullable();
            // $table->foreign('activity_source_of_fund')->reference('id')->on('ref_source_of_fund');
            $table->string('responsible_person')->nullable();
            $table->string('activity_timeframe')->nullable();
            $table->string('target_q1')->nullable();
            $table->string('target_q2')->nullable();
            $table->string('target_q3')->nullable();
            $table->string('target_q4')->nullable();
            $table->decimal('activity_cost',20,2)->nullable();
            // $table->integer('status');
            // $table->foreign('status')->reference('id')->on('tbl_program_activity_status');
            $table->integer('encoded_by');
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
        Schema::dropIfExists('table_wfp_activity');
    }
}
