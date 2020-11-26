<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users_chat_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_from');
            $table->string('username');
            $table->string('designation');
            $table->integer('user_to');
            $table->string('pic');
            $table->string('message');
            $table->enum('isRead',['Y','N']);
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
        Schema::dropIfExists('tbl_users_chat_messages');
    }
}
