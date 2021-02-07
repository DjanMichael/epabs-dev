<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefBudgetLineItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_budget_line_item', function (Blueprint $table) {
            $table->id();
            $table->integer('fund_source_id')->default(0);
            $table->string('budget_item');
            $table->integer('year_id')->default(0);
            $table->decimal('allocation_amount',10,2);
            $table->string('saa_ctrl_number')->default("");
            $table->string('purpose')->default("");
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
        //
    }
}
