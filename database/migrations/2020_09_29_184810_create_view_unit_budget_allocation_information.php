<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateViewUnitBudgetAllocationInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW  vw_unit_budget_allocation_utilization AS (
                SELECT
                    `up`.`user_id` AS `user_id`,
                    `u`.`name` AS `name`,
                    `up`.`designation` AS `designation`,
                    `ru`.`division` AS `division`,
                    `ru`.`section` AS `section`,
                    `tuba`.`budget_line_item_id` AS `budget_line_item_id`,
                    `rbli`.`budget_item` AS `budget_item`,
                    `tuba`.`unit_id` AS `unit_id`,
                    `tuba`.`year_id` AS `year_id`,
                    `ry`.`year` AS `year`,
                    (
                        SELECT
                            `tw`.`code`
                        FROM
                            `tbl_wfp` `tw`
                        WHERE
                            `tw`.`user_id` = `up`.`user_id`
                        AND `tw`.`year_id` = `tuba`.`year_id`
                        AND `tw`.`unit_id` = `up`.`unit_id`
                    ) AS `wfp_code`,
                    (
                        SELECT
                            sum(`tuba3`.`program_budget`)
                        FROM
                            `tbl_unit_budget_allocation` `tuba3`
                        WHERE
                            `tuba3`.`year_id` = `tuba`.`year_id`
                        AND `tuba3`.`unit_id` = `tuba`.`unit_id`
                        AND `tuba3`.`budget_line_item_id` = `tuba`.`budget_line_item_id`
                    ) AS `program_budget`,
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
                                                    `tbl_ppmp_items` `tpi`
                                                WHERE
                                                    `tpi`.`wfp_act_per_indicator_id` = `twapi`.`id`
                                            )
                                        ),
                                        0
                                    )
                                FROM
                                    `tbl_wfp_activity_per_indicator` `twapi`
                                WHERE
                                    `twapi`.`wfp_code` = `tw`.`code`
                                AND `twapi`.`bli_id` = `tuba`.`budget_line_item_id`
                            )
                        FROM
                            `tbl_wfp` `tw`
                        WHERE
                            `tw`.`user_id` = `up`.`user_id`
                        AND `tw`.`year_id` = `tuba`.`year_id`
                        AND `tw`.`unit_id` = `up`.`unit_id`
                    ) AS `utilized`,
                    COALESCE (
                        `tuba`.`program_budget` - (
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
                                                        `tbl_ppmp_items` `tpi`
                                                    WHERE
                                                        `tpi`.`wfp_act_per_indicator_id` = `twapi`.`id`
                                                )
                                            ),
                                            0
                                        )
                                    FROM
                                        `tbl_wfp_activity_per_indicator` `twapi`
                                    WHERE
                                        `twapi`.`wfp_code` = `tw`.`code`
                                    AND `twapi`.`bli_id` = `tuba`.`budget_line_item_id`
                                )
                            FROM
                                `tbl_wfp` `tw`
                            WHERE
                                `tw`.`user_id` = `up`.`user_id`
                            AND `tw`.`year_id` = `tuba`.`year_id`
                            AND `tw`.`unit_id` = `up`.`unit_id`
                        ),
                        0
                    ) AS `balance`,
                    (
                        SELECT
                            sum(`tuba2`.`program_budget`)
                        FROM
                            `tbl_unit_budget_allocation` `tuba2`
                        WHERE
                            `tuba2`.`unit_id` = `tuba`.`unit_id`
                        AND `tuba2`.`year_id` = `tuba`.`year_id`
                    ) AS `yearly_budget`,
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
                                                    `tbl_ppmp_items` `tpi`
                                                WHERE
                                                    `tpi`.`wfp_act_per_indicator_id` = `twapi`.`id`
                                            )
                                        ),
                                        0
                                    )
                                FROM
                                    `tbl_wfp_activity_per_indicator` `twapi`
                                WHERE
                                    `twapi`.`wfp_code` = `tw`.`code`
                            )
                        FROM
                            `tbl_wfp` `tw`
                        WHERE
                            `tw`.`user_id` = `up`.`user_id`
                        AND `tw`.`year_id` = `tuba`.`year_id`
                        AND `tw`.`unit_id` = `up`.`unit_id`
                    ) AS `yearly_utilized`
                FROM
                    (
                        (
                            (
                                (
                                    (
                                        (
                                            `users_profile` `up`
                                            JOIN `users` `u` ON (`u`.`id` = `up`.`user_id`)
                                        )
                                        JOIN `ref_units` `ru` ON (`ru`.`id` = `up`.`unit_id`)
                                    )
                                    JOIN `tbl_unit_budget_allocation` `tuba` ON (
                                        `tuba`.`unit_id` = `up`.`unit_id`
                                    )
                                )
                                JOIN `ref_year` `ry` ON (`ry`.`id` = `tuba`.`year_id`)
                            )
                            JOIN `tbl_wfp_activity_per_indicator` `twapi` ON (
                                `twapi`.`wfp_code` = `twapi`.`wfp_code`
                            )
                        )
                        JOIN `ref_budget_line_item` `rbli` ON (
                            `rbli`.`id` = `tuba`.`budget_line_item_id`
                        )
                    )
                GROUP BY
                    `tuba`.`year_id`,
                    `up`.`unit_id`,
                    `tuba`.`budget_line_item_id`
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
        Schema::dropIfExists('DROP VIEW IF EXISTS vw_unit_budget_allocation');
    }
}