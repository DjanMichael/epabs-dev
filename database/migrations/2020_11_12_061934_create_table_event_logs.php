<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEventLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('from_user_id');
            $table->integer('to_user_id');
            $table->string('icon');
            $table->string('icon_level');
            $table->string('notif_type');
            $table->string('event_name');
            $table->string('event_title');
            $table->string('event_description');
            $table->string('isRead');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_event_logs');
    }
}
