<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterWfpActivityAddColumnWfpActivityId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tbl_wfp_activity
        Schema::table('tbl_wfp_activity', function (Blueprint $table) {
            $table->string('wfp_activity_id')->after('wfp_code');
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
            $table->dropColumn('wfp_activity_id');
        });
    }
}
