<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwGetAllYearBudgetPerUnitDataset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement("
            CREATE VIEW vw_get_all_programs_with_count_budget_per_year AS (
             (select `dataset1`.`t1_unit_id` AS `t1_unit_id`,`dataset1`.`t1_year_id` AS `t1_year_id`,`dataset1`.`hasBudget` AS `hasBudget`,`dataset1`.`t1_user_id` AS `t1_user_id`,`dataset1`.`t1_role_id` AS `t1_role_id`,`dataset1`.`t1_name` AS `t1_name`,`dataset1`.`t1_designation` AS `t1_designation`,`dataset1`.`t1_division` AS `t1_division`,`dataset1`.`t1_section` AS `t1_section`,`dataset1`.`t1_program_id` AS `t1_program_id`,`dataset1`.`t1_program_name` AS `t1_program_name`,`dataset2`.`user_id` AS `user_id`,`dataset2`.`name` AS `name`,`dataset2`.`designation` AS `designation`,`dataset2`.`division` AS `division`,`dataset2`.`section` AS `section`,`dataset2`.`budget_line_item_id` AS `budget_line_item_id`,`dataset2`.`budget_item` AS `budget_item`,`dataset2`.`unit_id` AS `unit_id`,`dataset2`.`year_id` AS `year_id`,`dataset2`.`year` AS `year`,`dataset2`.`wfp_code` AS `wfp_code`,`dataset2`.`program_budget` AS `program_budget`,`dataset2`.`utilized_pi` AS `utilized_plan`,`dataset2`.`yearly_budget` - `dataset2`.`yearly_pi_utilized` AS `yearly_balance`,`dataset2`.`yearly_budget` AS `yearly_budget`,(select sum(`tuba`.`program_budget`) from `epabs`.`tbl_unit_budget_allocation` `tuba` where `tuba`.`year_id` = `dataset2`.`year_id` and `tuba`.`program_id` = `dataset2`.`program_id` and `tuba`.`budget_line_item_id` = `dataset2`.`budget_line_item_id`) AS `yearly_budget2`,`dataset2`.`yearly_pi_utilized` AS `yearly_pi_utilized`,coalesce((select sum(`vubau`.`ppmp_actual_balance`) from `epabs`.`vw_unit_budget_allocation_utilization` `vubau` where `vubau`.`year_id` = `dataset2`.`year_id` and `vubau`.`program_id` = `dataset1`.`t1_program_id`),0) AS `yearly_actual_cost`,coalesce((select `tpc`.`amount` from `epabs`.`tbl_program_conap` `tpc` where `tpc`.`year_id` = `dataset2`.`year_id` and `tpc`.`program_id` = `dataset1`.`t1_program_id`),0) AS `conap`,coalesce((select sum(`vubau`.`ppmp_actual_balance`) from `epabs`.`vw_unit_budget_allocation_utilization` `vubau` where `vubau`.`year_id` = `dataset2`.`year_id` and `vubau`.`program_id` = `dataset1`.`t1_program_id`),0) - coalesce((select `tpc`.`amount` from `epabs`.`tbl_program_conap` `tpc` where `tpc`.`year_id` = `dataset2`.`year_id` and `tpc`.`program_id` = `dataset1`.`t1_program_id`),0) AS `actual_bal` from ((select `tup`.`program_id` AS `program_id`,`tup`.`user_id` AS `user_id`,`tup`.`unit_id` AS `t1_unit_id`,`ru`.`division` AS `t1_division`,`ru`.`section` AS `t1_section`,`rp`.`id` AS `t1_program_id`,`rp`.`program_name` AS `t1_program_name`,`ry`.`id` AS `t1_year_id`,`u`.`id` AS `t1_user_id`,`u`.`name` AS `t1_name`,`u`.`role_id` AS `t1_role_id`,`up`.`designation` AS `t1_designation`,(select count(0) from `epabs`.`tbl_unit_budget_allocation` `tuba` where `tuba`.`unit_id` = `t1_unit_id` and `tuba`.`year_id` = `t1_year_id`) AS `hasBudget` from (((((`epabs`.`tbl_unit_program` `tup` join `epabs`.`ref_year` `ry` on(`ry`.`year` <> `tup`.`id`)) join `epabs`.`ref_units` `ru` on(`ru`.`id` = `tup`.`unit_id`)) join `epabs`.`users` `u` on(`u`.`id` = `tup`.`user_id`)) join `epabs`.`users_profile` `up` on(`up`.`user_id` = `u`.`id`)) join `epabs`.`ref_program` `rp` on(`rp`.`id` = `tup`.`program_id`))) `dataset1` left join `epabs`.`vw_unit_budget_allocation_utilization` `dataset2` on(`dataset2`.`program_id` = `dataset1`.`t1_program_id` and `dataset2`.`year_id` = `dataset1`.`t1_year_id`)) where `dataset1`.`t1_role_id` = (select `tbr`.`role_id` from `epabs`.`tbl_user_roles` `tbr` where `tbr`.`roles` = 'PROGRAM COORDINATOR'))
            )");
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
