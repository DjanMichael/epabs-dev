<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProcurementSupplies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_procurement_supplies', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('unit_id');
            $table->integer('classification_id');
            $table->decimal('price',10,2);
            $table->enum('fix_price',['Y','N']);
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
        Schema::dropIfExists('tbl_procurement_supplies');
    }
}
