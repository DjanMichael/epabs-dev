<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwBliSummary extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_bli_summary AS (
                (
                    SELECT
                        `ry`.`id` AS `id`,
                        `ry`.`year` AS `year`,
                        `rbli`.`budget_item` AS `budget_item`,
                        COALESCE (
                            (
                                SELECT
                                    sum(`tuba`.`program_budget`)
                                FROM
                                    `tbl_unit_budget_allocation` `tuba`
                                WHERE
                                    `tuba`.`budget_line_item_id` = `rbli`.`id`
                            ),
                            0
                        ) AS `allocation`,
                        (
                            SELECT
                                (
                                    SELECT
                                        COALESCE (
                                            sum(
                                                (
                                                    SELECT
                                                        (
                                                            COALESCE (`tpi`.`jan`, 0) + COALESCE (`tpi`.`feb`, 0) + COALESCE (`tpi`.`mar`, 0) + COALESCE (`tpi`.`apr`, 0) + COALESCE (`tpi`.`may`, 0) + COALESCE (`tpi`.`june`, 0) + COALESCE (`tpi`.`july`, 0) + COALESCE (`tpi`.`aug`, 0) + COALESCE (`tpi`.`sept`, 0) + COALESCE (`tpi`.`oct`, 0) + COALESCE (`tpi`.`nov`, 0) + COALESCE (`tpi`.`dec`, 0)
                                                        ) * `tpi`.`price`
                                                    FROM
                                                        `tbl_ppmp_items` `tpi3`
                                                    WHERE
                                                        `tpi3`.`id` = `tpi`.`id`
                                                )
                                            ),
                                            0
                                        )
                                    FROM
                                        `tbl_ppmp_items` `tpi`
                                    WHERE
                                        `tpi`.`wfp_act_per_indicator_id` = group_concat(`twapi`.`id` SEPARATOR ',')
                                )
                            FROM
                                `tbl_wfp_activity_per_indicator` `twapi`
                            WHERE
                                substr(`twapi`.`wfp_code`, 7, 3) - 0 = `ry`.`id`
                            AND `twapi`.`bli_id` = `rbli`.`id`
                        ) AS `utilized_ppmp_actual`,
                        COALESCE (
                            (
                                SELECT
                                    sum(`tuba`.`program_budget`)
                                FROM
                                    `tbl_unit_budget_allocation` `tuba`
                                WHERE
                                    `tuba`.`budget_line_item_id` = `rbli`.`id`
                            ),
                            0
                        ) - (
                            SELECT
                                (
                                    SELECT
                                        COALESCE (
                                            sum(
                                                (
                                                    SELECT
                                                        (
                                                            COALESCE (`tpi`.`jan`, 0) + COALESCE (`tpi`.`feb`, 0) + COALESCE (`tpi`.`mar`, 0) + COALESCE (`tpi`.`apr`, 0) + COALESCE (`tpi`.`may`, 0) + COALESCE (`tpi`.`june`, 0) + COALESCE (`tpi`.`july`, 0) + COALESCE (`tpi`.`aug`, 0) + COALESCE (`tpi`.`sept`, 0) + COALESCE (`tpi`.`oct`, 0) + COALESCE (`tpi`.`nov`, 0) + COALESCE (`tpi`.`dec`, 0)
                                                        ) * `tpi`.`price`
                                                    FROM
                                                        `tbl_ppmp_items` `tpi3`
                                                    WHERE
                                                        `tpi3`.`id` = `tpi`.`id`
                                                )
                                            ),
                                            0
                                        )
                                    FROM
                                        `tbl_ppmp_items` `tpi`
                                    WHERE
                                        `tpi`.`wfp_act_per_indicator_id` = group_concat(`twapi`.`id` SEPARATOR ',')
                                )
                            FROM
                                `tbl_wfp_activity_per_indicator` `twapi`
                            WHERE
                                substr(`twapi`.`wfp_code`, 7, 3) - 0 = `ry`.`id`
                            AND `twapi`.`bli_id` = `rbli`.`id`
                        ) AS `remaining_budget`
                    FROM
                        (
                            (
                                `tbl_wfp_activity_per_indicator` `twapi`
                                JOIN `ref_year` `ry`
                            )
                            JOIN `ref_budget_line_item` `rbli` ON (`rbli`.`year_id` = `ry`.`id`)
                        )
                    GROUP BY
                        `ry`.`year`,
                        `rbli`.`budget_item`
                    ORDER BY
                        `rbli`.`budget_item`
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
        DB2::statement('DROP VIEW IF EXIST vw_bli_summary');
    }
}
