<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwFunctionClassDashboardCountActAndCost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_function_class_summary AS (
                SELECT
                    `twa`.`id` AS `id`,
                    trim(
                        LEADING "0"
                        FROM
                            substr(`twa`.`wfp_code`, 7, 3)
                    ) AS `year_id`,
                    count(`twa`.`id`) AS `no_act`,
                    COALESCE (
                        (
                            SELECT
                                (
                                    SELECT
                                        `rfd`.`function_class`
                                    FROM
                                        `ref_function_deliverables` `rfd`
                                    WHERE
                                        `rfd`.`id` = `taof`.`output_function_id`
                                )
                            FROM
                                `tbl_activity_output_function` `taof`
                            WHERE
                                `taof`.`id` = `twa`.`out_function`
                        ),
                        0
                    ) AS `class`,
                    COALESCE(sum(`twa`.`activity_cost`),0) AS `total`
                FROM
                    `tbl_wfp_activity` `twa`
                WHERE
                    `twa`.`activity_cost` IS NOT NULL
                GROUP BY
                    COALESCE (
                        (
                            SELECT
                                (
                                    SELECT
                                        `rfd`.`function_class`
                                    FROM
                                        `ref_function_deliverables` `rfd`
                                    WHERE
                                        `rfd`.`id` = `taof`.`output_function_id`
                                )
                            FROM
                                `tbl_activity_output_function` `taof`
                            WHERE
                                `taof`.`id` = `twa`.`out_function`
                        ),
                        0
                    ),
                    trim(
                        LEADING "0"
                        FROM
                            substr(`twa`.`wfp_code`, 7, 3)
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
        DB2::statement('DROP VIEW IF EXIST vw_function_class_summary');
    }
}
