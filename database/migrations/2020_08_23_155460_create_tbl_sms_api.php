<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSmsApi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sms_api', function (Blueprint $table) {
            $table->id();
            $table->string('api_server');
            $table->string('to');
            $table->string('message');
            $table->string('service_card');
            $table->enum('status',['QUEUE','SENT'])->default('QUEUE');
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
        Schema::dropIfExists('tbl_sms_api');
    }
}
