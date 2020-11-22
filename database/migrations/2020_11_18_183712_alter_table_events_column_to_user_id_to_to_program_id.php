<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEventsColumnToUserIdToToProgramId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_event_logs', function (Blueprint $table) {
            $table->renameColumn('to_user_id','to_program_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_event_logs', function (Blueprint $table) {
            $table->renameColumn('to_program_id','to_user_id');
        });
    }
}
