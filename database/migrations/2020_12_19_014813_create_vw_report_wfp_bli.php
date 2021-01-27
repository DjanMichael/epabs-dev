<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwReportWfpBli extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW  vw_report_wfp_bli AS (
                SELECT
                    `rbli`.`id` AS `id`,
                    `rbli`.`budget_item` AS `budget_item`,
                    `ry`.`id` AS `year_id`,
                    `ry`.`year` AS `year`
                FROM
                    (
                        `ref_budget_line_item` `rbli`
                        JOIN `ref_year` `ry`
                    )
            )
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vw_report_app_details');
    }
}
