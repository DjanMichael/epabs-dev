<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPpmpItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ppmp_items', function (Blueprint $table) {
            $table->id();
            $table->integer('wfp_act_per_indicator_id');
            $table->integer('item_id');
            $table->decimal('price',10,2);
            $table->integer('jan')->default(0);
            $table->integer('feb')->default(0);
            $table->integer('mar')->default(0);
            $table->integer('apr')->default(0);
            $table->integer('may')->default(0);
            $table->integer('june')->default(0);
            $table->integer('july')->default(0);
            $table->integer('aug')->default(0);
            $table->integer('sept')->default(0);
            $table->integer('oct')->default(0);
            $table->integer('nov')->default(0);
            $table->integer('dec')->default(0);
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
        Schema::dropIfExists('tbl_ppmp_items');
    }
}
