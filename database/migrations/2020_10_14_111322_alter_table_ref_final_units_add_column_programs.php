<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRefFinalUnitsAddColumnPrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ref_units', function (Blueprint $table) {
            $table->integer('program_id')->nullable()->after('section');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ref_units', function (Blueprint $table) {
            $table->dropColumn('program_id');
         });
    }
}
