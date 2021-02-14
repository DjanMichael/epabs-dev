<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwUnitBudgetAllocationInformation extends Migration
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
                (
                    SELECT
                    (
                        SELECT
                            `u`.`name`
                        FROM
                            `users` `u`
                        WHERE
                            `u`.`id` = (
                                SELECT
                                    `tbl_unit_program`.`user_id`
                                FROM
                                    `tbl_unit_program`
                                WHERE
                                    `tbl_unit_program`.`program_id` = `tup`.`program_id`
                            )
                    ) AS `name`,
                    (
                        SELECT
                            `up`.`designation`
                        FROM
                            `users_profile` `up`
                        WHERE
                            `up`.`user_id` = (
                                SELECT
                                    `tbl_unit_program`.`user_id`
                                FROM
                                    `tbl_unit_program`
                                WHERE
                                    `tbl_unit_program`.`program_id` = `tup`.`program_id`
                            )
                    ) AS `designation`,
                    `ru`.`division` AS `division`,
                    `ru`.`section` AS `section`,
                    `tup`.`program_id` AS `program_id`,
                    `rp`.`program_name` AS `program_name`,
                    (
                        SELECT
                            `tbl_unit_program`.`user_id`
                        FROM
                            `tbl_unit_program`
                        WHERE
                            `tbl_unit_program`.`program_id` = `tup`.`program_id`
                    ) AS `user_id`,
                    `tuba`.`id` AS `tuba_id`,
                    `tuba`.`budget_line_item_id` AS `budget_line_item_id`,
                    `rbli`.`budget_item` AS `budget_item`,
                    `rbli`.`fund_source_id` AS `fund_source_id`,
                    (
                        SELECT
                            `rsof`.`sof_classification`
                        FROM
                            `ref_source_of_fund` `rsof`
                        WHERE
                            `rsof`.`id` = `rbli`.`fund_source_id`
                    ) AS `source_of_fund_classification`,
                    `rbli`.`purpose` AS `purpose`,
                    `tuba`.`unit_id` AS `unit_id`,
                    `tuba`.`year_id` AS `year_id`,
                    `ry`.`year` AS `year`,
                    (
                        SELECT
                            sum(`tuba3`.`program_budget`)
                        FROM
                            `tbl_unit_budget_allocation` `tuba3`
                        WHERE
                            `tuba3`.`year_id` = `tuba`.`year_id`
                        AND `tuba3`.`unit_id` = `tuba`.`unit_id`
                        AND `tuba3`.`budget_line_item_id` = `tuba`.`budget_line_item_id`
                        AND `tuba3`.`program_id` = `tup`.`program_id`
                    ) AS `program_budget`,
                    (
                        SELECT
                            COALESCE (sum(`twapi`.`cost`), 0)
                        FROM
                            `tbl_wfp_activity_per_indicator` `twapi`
                        WHERE
                            `twapi`.`bli_id` = `tuba`.`budget_line_item_id`
                        AND trim(
                            LEADING "0"
                            FROM
                                substr(`twapi`.`wfp_code`, 1, 3)
                        ) = `tup`.`user_id`
                        AND trim(
                            LEADING "0"
                            FROM
                                substr(`twapi`.`wfp_code`, 4, 3)
                        ) = `tuba`.`unit_id`
                        AND trim(
                            LEADING "0"
                            FROM
                                substr(`twapi`.`wfp_code`, 7, 3)
                        ) = `tuba`.`year_id`
                        AND trim(
                            LEADING "0"
                            FROM
                                substr(`twapi`.`wfp_code`, 10, 3)
                        ) = `tup`.`program_id`
                    ) AS `utilized_pi`,
                    cast(
                        `tuba`.`program_budget` - COALESCE (
                            (
                                SELECT
                                    COALESCE (sum(`twapi`.`cost`), 0)
                                FROM
                                    (
                                        `tbl_wfp_activity_per_indicator` `twapi`
                                        JOIN `tbl_wfp_activity` `twa` ON (
                                            `twa`.`id` = `twapi`.`wfp_act_id`
                                        )
                                    )
                                WHERE
                                    `twapi`.`bli_id` = `tuba`.`budget_line_item_id`
                                AND trim(
                                    LEADING "0"
                                    FROM
                                        substr(`twapi`.`wfp_code`, 1, 3)
                                ) = `tup`.`user_id`
                                AND trim(
                                    LEADING "0"
                                    FROM
                                        substr(`twapi`.`wfp_code`, 4, 3)
                                ) = `tuba`.`unit_id`
                                AND trim(
                                    LEADING "0"
                                    FROM
                                        substr(`twapi`.`wfp_code`, 7, 3)
                                ) = `tuba`.`year_id`
                                AND trim(
                                    LEADING "0"
                                    FROM
                                        substr(`twapi`.`wfp_code`, 10, 3)
                                ) = `tup`.`program_id`
                            ),
                            0
                        ) AS DECIMAL (20, 2)
                    ) AS `utilized_pi_balance`,
                    COALESCE (
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
                                `tpi`.`wfp_act_per_indicator_id` IN (
                                    SELECT
                                        `twapi2`.`id`
                                    FROM
                                        `tbl_wfp_activity_per_indicator` `twapi2`
                                    WHERE
                                        `twapi2`.`bli_id` = `tuba`.`budget_line_item_id`
                                    AND trim(
                                        LEADING "0"
                                        FROM
                                            substr(`twapi2`.`wfp_code`, 1, 3)
                                    ) = `tup`.`user_id`
                                    AND trim(
                                        LEADING "0"
                                        FROM
                                            substr(`twapi2`.`wfp_code`, 4, 3)
                                    ) = `tuba`.`unit_id`
                                    AND trim(
                                        LEADING "0"
                                        FROM
                                            substr(`twapi2`.`wfp_code`, 7, 3)
                                    ) = `tuba`.`year_id`
                                    AND trim(
                                        LEADING "0"
                                        FROM
                                            substr(`twapi2`.`wfp_code`, 10, 3)
                                    ) = `tup`.`program_id`
                                )
                        )
                    ) AS `utilized_ppmp_actual`,
                    COALESCE (
                        `tuba`.`program_budget` - COALESCE (
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
                                    `tpi`.`wfp_act_per_indicator_id` IN (
                                        SELECT
                                            `twapi2`.`id`
                                        FROM
                                            `tbl_wfp_activity_per_indicator` `twapi2`
                                        WHERE
                                            `twapi2`.`bli_id` = `tuba`.`budget_line_item_id`
                                        AND trim(
                                            LEADING "0"
                                            FROM
                                                substr(`twapi2`.`wfp_code`, 1, 3)
                                        ) = `tup`.`user_id`
                                        AND trim(
                                            LEADING "0"
                                            FROM
                                                substr(`twapi2`.`wfp_code`, 4, 3)
                                        ) = `tuba`.`unit_id`
                                        AND trim(
                                            LEADING "0"
                                            FROM
                                                substr(`twapi2`.`wfp_code`, 7, 3)
                                        ) = `tuba`.`year_id`
                                        AND trim(
                                            LEADING "0"
                                            FROM
                                                substr(`twapi2`.`wfp_code`, 10, 3)
                                        ) = `tup`.`program_id`
                                    )
                            ),
                            0
                        )
                    ) AS `ppmp_actual_balance`,
                    (
                        SELECT
                            sum(`tuba2`.`program_budget`)
                        FROM
                            `tbl_unit_budget_allocation` `tuba2`
                        WHERE
                            `tuba2`.`unit_id` = `tuba`.`unit_id`
                        AND `tuba2`.`year_id` = `tuba`.`year_id`
                        AND `tuba2`.`program_id` = `tuba`.`program_id`
                    ) AS `yearly_budget`,
                    COALESCE (
                        (
                            SELECT
                                sum(`twa2`.`activity_cost`)
                            FROM
                                `tbl_wfp_activity` `twa2`
                            WHERE
                                trim(
                                    LEADING "0"
                                    FROM
                                        substr(`twa2`.`wfp_code`, 1, 3)
                                ) = `tup`.`user_id`
                            AND trim(
                                LEADING "0"
                                FROM
                                    substr(`twa2`.`wfp_code`, 4, 3)
                            ) = `tuba`.`unit_id`
                            AND trim(
                                LEADING "0"
                                FROM
                                    substr(`twa2`.`wfp_code`, 7, 3)
                            ) = `tuba`.`year_id`
                            AND trim(
                                LEADING "0"
                                FROM
                                    substr(`twa2`.`wfp_code`, 10, 3)
                            ) = `tup`.`program_id`
                        ),
                        0
                    ) AS `yearly_pi_utilized`,
                    COALESCE (
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
                                `tpi`.`wfp_act_per_indicator_id` IN (
                                    SELECT
                                        `twapi2`.`id`
                                    FROM
                                        `tbl_wfp_activity_per_indicator` `twapi2`
                                    WHERE
                                        trim(
                                            LEADING "0"
                                            FROM
                                                substr(`twapi2`.`wfp_code`, 1, 3)
                                        ) = `tup`.`user_id`
                                    AND trim(
                                        LEADING "0"
                                        FROM
                                            substr(`twapi2`.`wfp_code`, 4, 3)
                                    ) = `tuba`.`unit_id`
                                    AND trim(
                                        LEADING "0"
                                        FROM
                                            substr(`twapi2`.`wfp_code`, 7, 3)
                                    ) = `tuba`.`year_id`
                                    AND trim(
                                        LEADING "0"
                                        FROM
                                            substr(`twapi2`.`wfp_code`, 10, 3)
                                    ) = `tup`.`program_id`
                                )
                        )
                    ) AS `yearly_utilized_ppmp_actual`,
                    COALESCE (
                        (
                            SELECT
                                `tpc`.`amount`
                            FROM
                                `tbl_program_conap` `tpc`
                            WHERE
                                `tpc`.`year_id` = `tuba`.`year_id`
                            AND `tpc`.`program_id` = `tuba`.`program_id`
                        ),
                        0
                    ) AS `conap`
                FROM
                    (
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
                                JOIN `ref_budget_line_item` `rbli` ON (
                                    `rbli`.`id` = `tuba`.`budget_line_item_id`
                                )
                            )
                            JOIN `tbl_unit_program` `tup` ON (
                                `tup`.`program_id` = `tuba`.`program_id`
                            )
                        )
                        JOIN `ref_program` `rp` ON (
                            `rp`.`id` = `tuba`.`program_id`
                        )
                    )
                GROUP BY
                    `tuba`.`id`
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
        Schema::dropIfExists('vw_unit_budget_allocation');
    }
}
