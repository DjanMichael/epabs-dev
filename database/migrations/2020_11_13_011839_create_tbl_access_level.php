<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAccessLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_access_level', function (Blueprint $table) {
            $table->id();
            $table->integer('access_level');
            $table->string('module');
            $table->string('submodule');
            $table->enum('can_add',['Y','N']);
            $table->enum('can_update',['Y','N']);
            $table->enum('can_delete',['Y','N']);
            $table->enum('can_print',['Y','N']);
            $table->enum('can_export',['Y','N']);
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
        Schema::dropIfExists('tbl_access_level');
    }
}
