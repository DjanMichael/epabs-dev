<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGlobalSystemSettingsAddSelectedProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_system_settings', function (Blueprint $table) {
            $table->string('select_program_id')->nullable()->after('select_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_system_settings', function (Blueprint $table) {
            $table->dropColumn('select_program_id');
        });
    }
}
