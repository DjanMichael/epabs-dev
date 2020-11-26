<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMessageTableAddTypeMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_users_chat_messages', function (Blueprint $table) {
            $table->string('msg_type')->default('TEXT')->after('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_users_chat_messages', function (Blueprint $table) {
            $table->dropColumn('msg_type');
        });
    }
}
