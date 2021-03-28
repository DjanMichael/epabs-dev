<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwTotalWfpPpmpByYear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
        CREATE VIEW  vw_total_wfp_ppmp_by_year AS (
            SELECT
                count(0) AS `wfp_count`,
                0 AS `ppmp_count`,
                `ds_wfp`.`year_id` AS `year_id`
            FROM
                (
                    SELECT
                        `tbl_wfp`.`code` AS `wfp_code`,
                        trim(
                            LEADING "0"
                            FROM
                                substr(
                                    `tbl_wfp`.`code`,
                                    7,
                                    3
                                )
                        ) AS `year_id`
                    FROM
                        `tbl_wfp`
                    GROUP BY
                        `tbl_wfp`.`code`
                ) `ds_wfp`
            GROUP BY
                `ds_wfp`.`year_id`
            UNION ALL
                SELECT
                    0 AS `0`,
                    count(0) AS `ppmp_count`,
                    `ds_wfp`.`year_id` AS `year_id`
                FROM
                    (
                        SELECT
                            `z_wfp_logs`.`wfp_code` AS `wfp_code`,
                            trim(
                                LEADING "0"
                                FROM
                                    substr(
                                        `z_wfp_logs`.`wfp_code`,
                                        7,
                                        3
                                    )
                            ) AS `year_id`
                        FROM
                            `z_wfp_logs`
                        WHERE
                            `z_wfp_logs`.`status` = "PPMP"
                        GROUP BY
                            `z_wfp_logs`.`wfp_code`
                    ) `ds_wfp`
                GROUP BY
                    `ds_wfp`.`year_id`
        )');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vw_total_wfp_ppmp_by_year');
    }
}
