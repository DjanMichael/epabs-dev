<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProgramConap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_program_conap', function (Blueprint $table) {
            $table->id();
            $table->integer('program_id')->nullable(false);
            $table->integer('year_id')->nullable(false);
            $table->integer('year_forwarded')->nullable(false);
            $table->decimal('amount',10,2)->nullable(false);
            $table->longText('bli_distribution')->nullable(false);
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
        Schema::dropIfExists('tbl_program_conap');
    }
}
