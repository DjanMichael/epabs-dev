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
                (select `rbli`.`id` AS `id`,`rbli`.`fund_source_id` AS `fund_source_id`,`rsof`.`sof_classification` AS `sof_classification`,`rbli`.`budget_item` AS `budget_item`,`rbli`.`program_id` AS `program_id`,`rp`.`program_name` AS `program_name`,`rbli`.`unit_id` AS `unit_id`,`ru`.`division` AS `division`,`ru`.`section` AS `section`,`rbli`.`year_id` AS `year_id`,`ry`.`year` AS `year`,`tuba`.`program_budget` AS `allocation_amount`,`rbli`.`saa_ctrl_number` AS `saa_ctrl_number`,`rbli`.`purpose` AS `purpose`,`rbli`.`status` AS `status` from (((((`ref_budget_line_item` `rbli` left join `ref_year` `ry` on(`ry`.`id` = `rbli`.`year_id`)) left join `ref_source_of_fund` `rsof` on(`rsof`.`id` = `rbli`.`fund_source_id`)) left join `tbl_unit_budget_allocation` `tuba` on(`tuba`.`budget_line_item_id` = `rbli`.`id`)) left join `ref_program` `rp` on(`rp`.`id` = `tuba`.`program_id`)) left join `ref_units` `ru` on(`ru`.`id` = `tuba`.`unit_id`)) order by `rbli`.`id`)
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
