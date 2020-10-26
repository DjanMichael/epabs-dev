<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePpmpItemsAddColumnItemType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_ppmp_items', function (Blueprint $table) {
            $table->string('item_type')->after('wfp_act_per_indicator_id');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_ppmp_items', function (Blueprint $table) {
            $table->dropColumn('item_type');
         });
    }
}
