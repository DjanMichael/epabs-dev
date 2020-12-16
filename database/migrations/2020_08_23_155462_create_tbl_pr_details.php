<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPrDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pr_details', function (Blueprint $table) {
            $table->id();
            $table->string('wfp_code');
            $table->integer('wfp_act');
            $table->string('pr_code');
            $table->integer('item_id');
            $table->string('item_type');
            $table->string('item_unit');
            $table->string('item_description');
            $table->string('item_classification');
            $table->integer('item_qty');
            $table->decimal('item_price',10,2);
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
        Schema::dropIfExists('tbl_pr_detailss');
    }
}
