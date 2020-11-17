<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableWfpComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_wfp_comments', function (Blueprint $table) {
            $table->integer('wfp_act_id')->after('wfp_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_wfp_comments', function (Blueprint $table) {
            $table->dropColumn('wfp_act_id');
        });
    }
}
