<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTblUnitBudgetAllocationAddColumnProgramId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_unit_budget_allocation', function (Blueprint $table) {
            $table->integer('program_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_unit_budget_allocation', function (Blueprint $table) {
            $table->dropColumn('program_id');
        });
    }
}
