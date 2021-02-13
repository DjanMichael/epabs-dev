<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTblPpmpWfpComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_wfp_comments', function (Blueprint $table) {
            $table->unsignedInteger('user_from',11)->nullable();
        });

        Schema::table('tbl_ppmp_comments', function (Blueprint $table) {
            $table->unsignedInteger('user_from',11)->nullable();
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
            $table->dropColumn('user_from');
        });

        Schema::table('tbl_ppmp_comments', function (Blueprint $table) {
            $table->dropColumn('user_from');
        });
    }
}
