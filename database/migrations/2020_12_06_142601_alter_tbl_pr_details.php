<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTblPrDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_pr_details', function (Blueprint $table) {
            $table->string('wfp_code')->after('id');
            $table->integer('wfp_act')->after('wfp_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_pr_details', function (Blueprint $table) {
            $table->dropColumn('wfp_code');
            $table->dropColumn('wfp_act');
        });
    }
}
