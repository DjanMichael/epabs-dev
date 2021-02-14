<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTblBudgetLineItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ref_budget_line_item', function (Blueprint $table) {
            $table->integer('program_id')->after('budget_item');
            $table->integer('unit_id')->after('program_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ref_budget_line_item', function (Blueprint $table) {
            $table->dropColumn('unit_program_id');
        });
    }
}
