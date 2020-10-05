<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWfpActivity extends Migration
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
            $table->integer('out_function')->isNullable();
            //$table->foreign('out_function')->references('id')->on('tbl_activity_output_function');
            $table->string('out_activity')->isNullable();
            $table->integer('activity_source_of_fund')->isNullable();
            // $table->foreign('activity_source_of_fund')->reference('id')->on('ref_source_of_fund');
            $table->string('responsible_person')->isNullable();
            $table->string('activity_timeframe')->isNullable();
            $table->string('target_q1')->isNullable();
            $table->string('target_q2')->isNullable();
            $table->string('target_q3')->isNullable();
            $table->string('target_q4')->isNullable();
            $table->decimal('activity_cost',20,2)->isNullable();
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
