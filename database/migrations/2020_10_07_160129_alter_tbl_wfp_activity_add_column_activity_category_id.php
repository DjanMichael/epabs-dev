<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTblWfpActivityAddColumnActivityCategoryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_wfp_activity', function (Blueprint $table) {
            $table->integer('activity_category_id')->nullable()->after('out_activity');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_wfp_activity', function (Blueprint $table) {
            $table->dropColumn('activity_category_id');
         });
    }
}
