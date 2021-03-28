<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;

class CreateVwBudgetLineItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB2::statement('
            CREATE VIEW vw_budget_line_item AS (
                SELECT
                    `rbli`.`id` AS `id`,
                    `rbli`.`fund_source_id` AS `fund_source_id`,
                    `rsof`.`sof_classification` AS `sof_classification`,
                    `rbli`.`budget_item` AS `budget_item`,
                    `rbli`.`program_id` AS `program_id`,
                    `rp`.`program_name` AS `program_name`,
                    `rbli`.`unit_id` AS `unit_id`,
                    `ru`.`division` AS `division`,
                    `ru`.`section` AS `section`,
                    `rbli`.`year_id` AS `year_id`,
                    `ry`.`year` AS `year`,
                    `rbli`.`allocation_amount` AS `allocation_amount`,
                    `rbli`.`saa_ctrl_number` AS `saa_ctrl_number`,
                    `rbli`.`purpose` AS `purpose`,
                    `rbli`.`status` AS `status` 
                FROM
                    `ref_budget_line_item` `rbli` 
                    LEFT JOIN `ref_year` `ry` ON ( `ry`.`id` = `rbli`.`year_id` ) 
                    LEFT JOIN `ref_source_of_fund` `rsof` ON ( `rsof`.`id` = `rbli`.`fund_source_id` ) 
                    LEFT JOIN `ref_program` `rp` ON ( `rp`.`id` = `rbli`.`program_id` ) 
                    LEFT JOIN `ref_units` `ru` ON ( `ru`.`id` = `rbli`.`unit_id` )
                ORDER BY
                    `rbli`.`id` 
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
        //
        DB2::statement('DROP VIEW IF EXIST vw_budget_line_item');
    }
}
