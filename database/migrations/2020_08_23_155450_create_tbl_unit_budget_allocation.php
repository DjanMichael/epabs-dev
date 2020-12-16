<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUnitBudgetAllocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_unit_budget_allocation', function (Blueprint $table) {
            $table->id();
            $table->integer('program_id');
            $table->integer('unit_id');
            // $table->foreign('program_id')->references('id')->on('ref_programs');
            $table->integer('budget_line_item_id');
            $table->decimal('program_budget',20,2);
            $table->integer('year_id');
            // $table->foreign('year_id')->references('id')->on('ref_year');
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
        Schema::dropIfExists('tbl_unit_budget_allocation');
    }
}
