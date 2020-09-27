<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwUnitBudgetUtilization extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_unit_budget_utilization AS (
                SELECT
                    `ru`.`id` AS `unit_id`,
                    `ru`.`division` AS `division`,
                    `ru`.`section` AS `section`,
                    `ry`.`id` AS `year_id`,
                    `ry`.`year` AS `year`,
                    `rbli`.`id` AS `bli_id`,
                    `rbli`.`budget_item` AS `budget_item`,
                    `tuba`.`id` AS `id`,
                    format(`tuba`.`program_budget`, 2) AS `program_budget`
                FROM
                    (
                        (
                            (
                                `tbl_unit_budget_allocation` `tuba`
                                JOIN `ref_units` `ru` ON (`ru`.`id` = `tuba`.`unit_id`)
                            )
                            JOIN `ref_budget_line_item` `rbli` ON (
                                `rbli`.`id` = `tuba`.`budget_line_item_id`
                            )
                        )
                        JOIN `ref_year` `ry` ON (`ry`.`id` = `tuba`.`year_id`)
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
        DB2::statement('DROP VIEW IF EXISTS vw_unit_budget_utilization');
    }
}
