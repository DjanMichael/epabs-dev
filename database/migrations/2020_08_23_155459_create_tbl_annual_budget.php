<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAnnualBudget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_annual_budget', function (Blueprint $table) {
            $table->id();
            $table->integer('year_id');
            $table->decimal('available_budget',10,2);
            $table->enum('if_conap',['Y','N']);
            $table->integer('conap_year_id')->default(0);
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
        Schema::dropIfExists('tbl_annual_budget');
    }
}
