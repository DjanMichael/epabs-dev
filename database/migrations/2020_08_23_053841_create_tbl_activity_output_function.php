<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblActivityOutputFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_activity_output_function', function (Blueprint $table) {
            $table->id();
            $table->integer('function_output');
            // $table->foreign('function_output')->references('id')->on('ref_function_deliverables');
            $table->string('function_description');
            $table->integer('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('tbl_activity_output_function');
    }
}
