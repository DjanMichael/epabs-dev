<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGlobalSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_system_settings', function (Blueprint $table) {
            $table->string('select_year')->nullable()->change();
            $table->string('sms_notification')->nullable()->change();
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
            $table->string('select_year')->nullable(false)->change();
            $table->string('sms_notification')->nullable(false)->change();
        });
    }
}
