<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRefBudgetLineItemAddColumnYearIdAndAllocatedBudget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ref_budget_line_item', function (Blueprint $table) {
            $table->integer('year_id')->after('budget_item');
            $table->integer('allocation_amount')->after('year_id');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ref_budget_line_item', function (Blueprint $table) {
            $table->dropColumn('year_id');
            $table->dropColumn('allocation_amount');
         });
    }
}
