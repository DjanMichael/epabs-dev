<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateViewGetAllYearBudgetPerUnitDataset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_get_all_programs_with_count_budget_per_year AS (
                SELECT
                    `dataset1`.`t1_unit_id` AS `t1_unit_id`,
                    `dataset1`.`t1_year_id` AS `t1_year_id`,
                    `dataset1`.`hasBudget` AS `hasBudget`,
                    `dataset1`.`t1_user_id` AS `t1_user_id`,
                    `dataset1`.`t1_role_id` AS `t1_role_id`,
                    `dataset1`.`t1_name` AS `t1_name`,
                    `dataset1`.`t1_designation` AS `t1_designation`,
                    `dataset1`.`t1_division` AS `t1_division`,
                    `dataset1`.`t1_section` AS `t1_section`,
                    `dataset1`.`t1_program_id` AS `t1_program_id`,
                    `dataset1`.`t1_program_name` AS `t1_program_name`,
                    `dataset2`.`user_id` AS `user_id`,
                    `dataset2`.`name` AS `name`,
                    `dataset2`.`designation` AS `designation`,
                    `dataset2`.`division` AS `division`,
                    `dataset2`.`section` AS `section`,
                    `dataset2`.`budget_line_item_id` AS `budget_line_item_id`,
                    `dataset2`.`budget_item` AS `budget_item`,
                    `dataset2`.`unit_id` AS `unit_id`,
                    `dataset2`.`year_id` AS `year_id`,
                    `dataset2`.`year` AS `year`,
                    `dataset2`.`wfp_code` AS `wfp_code`,
                    `dataset2`.`program_budget` AS `program_budget`,
                    `dataset2`.`utilized_pi` AS `utilized_plan`,
                    `dataset2`.`yearly_budget` - `dataset2`.`yearly_utilized` AS `yearly_balance`,
                    `dataset2`.`yearly_budget` AS `yearly_budget`,
                    (
                        SELECT
                            sum(`tuba`.`program_budget`)
                        FROM
                            `tbl_unit_budget_allocation` `tuba`
                        WHERE
                            `tuba`.`year_id` = `dataset2`.`year_id`
                        AND `tuba`.`program_id` = `dataset2`.`program_id`
                        AND `tuba`.`budget_line_item_id` = `dataset2`.`budget_line_item_id`
                    ) AS `yearly_budget2`,
                    `dataset2`.`yearly_utilized` AS `yearly_utilized`
                FROM
                    (
                        (
                            SELECT
                                `tup`.`program_id` AS `program_id`,
                                `tup`.`user_id` AS `user_id`,
                                `tup`.`unit_id` AS `t1_unit_id`,
                                `ru`.`division` AS `t1_division`,
                                `ru`.`section` AS `t1_section`,
                                `rp`.`id` AS `t1_program_id`,
                                `rp`.`program_name` AS `t1_program_name`,
                                `ry`.`id` AS `t1_year_id`,
                                `u`.`id` AS `t1_user_id`,
                                `u`.`name` AS `t1_name`,
                                `u`.`role_id` AS `t1_role_id`,
                                `up`.`designation` AS `t1_designation`,
                                (
                                    SELECT
                                        count(0)
                                    FROM
                                        `tbl_unit_budget_allocation` `tuba`
                                    WHERE
                                        `tuba`.`unit_id` = `t1_unit_id`
                                    AND `tuba`.`year_id` = `t1_year_id`
                                ) AS `hasBudget`
                            FROM
                                (
                                    (
                                        (
                                            (
                                                (
                                                     `tbl_unit_program` `tup`
                                                    JOIN `ref_year` `ry` ON (`ry`.`year` <> `tup`.`id`)
                                                )
                                                JOIN `ref_units` `ru` ON (`ru`.`id` = `tup`.`unit_id`)
                                            )
                                            JOIN `users` `u` ON (`u`.`id` = `tup`.`user_id`)
                                        )
                                        JOIN `users_profile` `up` ON (`up`.`user_id` = `u`.`id`)
                                    )
                                    JOIN `ref_program` `rp` ON (
                                        `rp`.`id` = `tup`.`program_id`
                                    )
                                )
                        ) `dataset1`
                        LEFT JOIN  `vw_unit_budget_allocation_utilization` `dataset2` ON (
                            `dataset2`.`program_id` = `dataset1`.`t1_program_id`
                            AND `dataset2`.`year_id` = `dataset1`.`t1_year_id`
                        )
                    )
                WHERE
                    `dataset1`.`t1_role_id` = (
                        SELECT
                            `tbr`.`role_id`
                        FROM
                             `tbl_user_roles` `tbr`
                        WHERE
                            `tbr`.`roles` = "PROGRAM COORDINATOR"
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
        Schema::dropIfExists('DROP VIEW vw_get_all_programs_with_count_budget_per_year');
    }
}
