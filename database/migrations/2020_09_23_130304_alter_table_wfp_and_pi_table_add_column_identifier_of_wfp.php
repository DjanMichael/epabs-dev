<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableWfpAndPiTableAddColumnIdentifierOfWfp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_wfp_activity', function (Blueprint $table) {
            $table->string('wfp_code')->after('id');
        });

        Schema::table('tbl_wfp_activity_per_indicator', function (Blueprint $table) {
            $table->string('wfp_code')->after('id');
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
            $table->dropColumn('wfp_code');
        });

        Schema::table('tbl_wfp_activity_per_indicator', function (Blueprint $table) {
            $table->dropColumn('wfp_code');
        });
    }
}
