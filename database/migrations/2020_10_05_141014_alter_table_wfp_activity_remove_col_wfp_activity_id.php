<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableWfpActivityRemoveColWfpActivityId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('tbl_wfp_activity', function (Blueprint $table) {
           $table->dropColumn('wfp_activity_id');
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
            $table->integer('wfp_activity_id');
         });
    }
}
