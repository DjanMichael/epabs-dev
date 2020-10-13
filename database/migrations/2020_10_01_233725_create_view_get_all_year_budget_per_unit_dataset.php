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
            CREATE VIEW  vw_get_all_programs_with_count_budget_per_year AS (
                    SELECT
                        `dataset1`.`t1_unit_id` AS `t1_unit_id`,
                        `dataset1`.`t1_year_id` AS `t1_year_id`,
                        `dataset1`.`hasBudget` AS `hasBudget`,
                        `dataset1`.`t1_user_id` AS `t1_user_id`,
                        `dataset1`.`t1_name` AS `t1_name`,
                        `dataset1`.`t1_designation` AS `t1_designation`,
                        `dataset1`.`t1_division` AS `t1_division`,
                        `dataset1`.`t1_section` AS `t1_section`,
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
                        `dataset2`.`utilized` AS `utilized`,
                        dataset2.utilized_plan as `utilized_plan`,
                        `dataset2`.`yearly_budget` - `dataset2`.`yearly_utilized` AS `yearly_balance`,
                        `dataset2`.`yearly_budget` AS `yearly_budget`,
                        `dataset2`.`yearly_utilized` AS `yearly_utilized`
                    FROM
                        (
                            (
                                SELECT
                                    `up`.`unit_id` AS `t1_unit_id`,
                                    `up`.`designation` AS `t1_designation`,
                                    `up`.`user_id` AS `t1_user_id`,
                                    `u`.`name` AS `t1_name`,
                                    `ru`.`division` AS `t1_division`,
                                    `ru`.`section` AS `t1_section`,
                                    `ry`.`id` AS `t1_year_id`,
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
                                                `users_profile` `up`
                                                JOIN `ref_year` `ry` ON (`ry`.`year` <> `up`.`id`)
                                            )
                                            JOIN `users` `u` ON (`u`.`id` = `up`.`user_id`)
                                        )
                                        JOIN `ref_units` `ru` ON (`ru`.`id` = `up`.`unit_id`)
                                    )
                            ) `dataset1`
                            LEFT JOIN `vw_unit_budget_allocation_utilization` `dataset2` ON (
                                `dataset2`.`unit_id` = `dataset1`.`t1_unit_id`
                                AND `dataset2`.`year_id` = `dataset1`.`t1_year_id`
                            )
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
        Schema::dropIfExists('view_get_all_year_budget_per_unit_dataset');
    }
}
