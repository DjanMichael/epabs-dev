<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProgramAop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_program_aop', function (Blueprint $table) {
            $table->id();
            $table->integer('conap_id');
            $table->string('mfo');
            $table->string('mfo_performance_indicator');
            $table->string('act_code_no');
            $table->string('title_activity_policies_system');
            $table->string('jan');
            $table->string('feb');
            $table->string('mar');
            $table->string('apr');
            $table->string('may');
            $table->string('june');
            $table->string('july');
            $table->string('aug');
            $table->string('sept');
            $table->string('oct');
            $table->string('nov');
            $table->string('dec');
            $table->string('item_qty');
            $table->string('item_cost');
            $table->string('total_cost');
            $table->string('uacs_code');
            $table->string('responsible_person');
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
        Schema::dropIfExists('tbl_program_aop');
    }
}
