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
            $table->string('budget_item');
            $table->integer('year_id')->default(0);
            $table->integer('allocation_amount')->default(0);
            $table->enum('if_conap',['Y','N']);
            $table->integer('conap_year_id')->default(0);
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
