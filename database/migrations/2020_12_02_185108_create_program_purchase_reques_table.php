<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramPurchaseRequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pr', function (Blueprint $table) {
            $table->id();
            $table->string('agency')->nullable(false);
            $table->string('division')->nullable(false);
            $table->string('office')->nullable(false);
            $table->date('sai_no')->nullable();
            $table->dateTime('sai_date')->nullable();
            $table->string('pr_no')->nullable();
            $table->dateTime('pr_date')->nullable(false);
            $table->string('pr_purpose')->nullable(false);
            $table->string('prepared_user_name')->nullable(false);
            $table->string('prepared_user_id')->nullable(false);
            $table->string('requested_user_name')->nullable();
            $table->string('requested_user_id')->nullable();
            $table->dateTime('requested_date')->nullable();
            $table->string('approved_user_name')->nullable();
            $table->string('approved_user_id')->nullable();
            $table->dateTime('approved_date')->nullable();
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
        Schema::dropIfExists('tbl_pr');
    }
}
