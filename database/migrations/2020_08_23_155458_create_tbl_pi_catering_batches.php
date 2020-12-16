<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPiCateringBatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pi_catering_batches', function (Blueprint $table) {
            $table->id();
            $table->integer('pi_id');
            $table->integer('batch_no');
            $table->integer('batch_location')->nullable();
            $table->timestamps();
        });

        Schema::table('tbl_ppmp_items', function (Blueprint $table) {
            $table->integer('batch_id')->nullable()->after('item_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pi_catering_batches');

        Schema::table('tbl_ppmp_items', function (Blueprint $table) {
            $table->dropColumn('batch_id');
        });
    }
}
