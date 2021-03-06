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
            $table->integer('output_function_id');
            // $table->foreign('function_output')->references('id')->on('ref_function_deliverables');
            $table->longText('description');
            $table->integer('user_id');
            $table->integer('program_id');
            $table->enum('status',['ACTIVE','INACTIVE']);
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
