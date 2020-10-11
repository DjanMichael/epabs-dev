<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefFunctionDeliverables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_function_deliverables', function (Blueprint $table) {
            $table->id();
            $table->string('class_sequence');
            $table->string('function_class');
            $table->enum('status',['ACTIVE','INACTIVE']);
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
        Schema::dropIfExists('ref_function_deliverables');
    }
}
