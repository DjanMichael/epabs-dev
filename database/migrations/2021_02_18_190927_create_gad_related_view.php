<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateGadRelatedView extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_gad_related_summary AS (
                SELECT
                    trim(
                        LEADING "0"
                        FROM
                            substr(`twa`.`wfp_code`, 7, 3)
                    ) AS `year_id`,
                    `twa`.`activity_gad_related` AS `activity_gad_related`,
                    count(0) AS `act_no`,
                    COALESCE (
                        sum(`twa`.`activity_cost`),
                        0
                    ) AS `total`
                FROM
                    `tbl_wfp_activity` `twa`
                GROUP BY
                    `twa`.`activity_gad_related`,
                    trim(
                        LEADING "0"
                        FROM
                            substr(`twa`.`wfp_code`, 7, 3)
                    )
        )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB2::statement('DROP VIEW IF EXIST vw_gad_related_summary');
    }
}
