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
                (select `u`.`name` AS `name`,`up`.`designation` AS `designation`,`ru`.`division` AS `division`,`ru`.`section` AS `section`,`tw`.`program_id` AS `program_id`,(select `ref_program`.`program_name` from `ref_program` where `ref_program`.`id` = `tw`.`program_id`) AS `program_name`,(select `tbl_unit_program`.`user_id` from `tbl_unit_program` where `tbl_unit_program`.`program_id` = `tup`.`program_id`) AS `user_id`,`tuba`.`id` AS `tuba_id`,`tuba`.`budget_line_item_id` AS `budget_line_item_id`,`rbli`.`budget_item` AS `budget_item`,`tuba`.`unit_id` AS `unit_id`,`tuba`.`year_id` AS `year_id`,`ry`.`year` AS `year`,`tw`.`code` AS `wfp_code`,(select count(0) from `tbl_wfp_activity` `twa` where `twa`.`wfp_code` = `tw`.`code`) AS `wfp_activity_count`,(select sum(`tuba3`.`program_budget`) from `tbl_unit_budget_allocation` `tuba3` where `tuba3`.`year_id` = `tuba`.`year_id` and `tuba3`.`unit_id` = `tuba`.`unit_id` and `tuba3`.`budget_line_item_id` = `tuba`.`budget_line_item_id` and `tuba3`.`program_id` = `tup`.`program_id`) AS `program_budget`,(select coalesce(sum(`twapi`.`cost`),0) from `tbl_wfp_activity_per_indicator` `twapi` where `twapi`.`bli_id` = `tuba`.`budget_line_item_id` and `twapi`.`wfp_code` = `tw`.`code`) AS `utilized_pi`,cast(`tuba`.`program_budget` - coalesce((select coalesce(sum(`twapi`.`cost`),0) from (`tbl_wfp_activity_per_indicator` `twapi` join `tbl_wfp_activity` `twa` on(`twa`.`id` = `twapi`.`wfp_act_id`)) where `twapi`.`bli_id` = `tuba`.`budget_line_item_id` and `twapi`.`wfp_code` = `tw`.`code`),0) as decimal(20,2)) AS `utilized_pi_balance`,coalesce((select coalesce(sum((select (coalesce(`tpi`.`jan`,0) + coalesce(`tpi`.`feb`,0) + coalesce(`tpi`.`mar`,0) + coalesce(`tpi`.`apr`,0) + coalesce(`tpi`.`may`,0) + coalesce(`tpi`.`june`,0) + coalesce(`tpi`.`july`,0) + coalesce(`tpi`.`aug`,0) + coalesce(`tpi`.`sept`,0) + coalesce(`tpi`.`oct`,0) + coalesce(`tpi`.`nov`,0) + coalesce(`tpi`.`dec`,0)) * `tpi`.`price` from `tbl_ppmp_items` `tpi3` where `tpi3`.`id` = `tpi`.`id`)),0) from `tbl_ppmp_items` `tpi` where `tpi`.`wfp_act_per_indicator_id` in (select `twapi2`.`id` from `tbl_wfp_activity_per_indicator` `twapi2` where `twapi2`.`wfp_code` = `tw`.`code` and `twapi2`.`bli_id` = `tuba`.`budget_line_item_id`))) AS `utilized_ppmp_actual`,coalesce(`tuba`.`program_budget` - coalesce((select coalesce(sum((select (coalesce(`tpi`.`jan`,0) + coalesce(`tpi`.`feb`,0) + coalesce(`tpi`.`mar`,0) + coalesce(`tpi`.`apr`,0) + coalesce(`tpi`.`may`,0) + coalesce(`tpi`.`june`,0) + coalesce(`tpi`.`july`,0) + coalesce(`tpi`.`aug`,0) + coalesce(`tpi`.`sept`,0) + coalesce(`tpi`.`oct`,0) + coalesce(`tpi`.`nov`,0) + coalesce(`tpi`.`dec`,0)) * `tpi`.`price` from `tbl_ppmp_items` `tpi3` where `tpi3`.`id` = `tpi`.`id`)),0) from `tbl_ppmp_items` `tpi` where `tpi`.`wfp_act_per_indicator_id` in (select `twapi2`.`id` from `tbl_wfp_activity_per_indicator` `twapi2` where `twapi2`.`wfp_code` = `tw`.`code` and `twapi2`.`bli_id` = `tuba`.`budget_line_item_id`)),0)) AS `ppmp_actual_balance`,(select sum(`tuba2`.`program_budget`) from `tbl_unit_budget_allocation` `tuba2` where `tuba2`.`unit_id` = `tw`.`unit_id` and `tuba2`.`year_id` = `tw`.`year_id` and `tuba2`.`program_id` = `tw`.`program_id`) AS `yearly_budget`,coalesce((select sum(`twa2`.`activity_cost`) from `tbl_wfp_activity` `twa2` where `twa2`.`wfp_code` = `tw`.`code`),0) AS `yearly_pi_utilized`,coalesce((select coalesce(sum((select (coalesce(`tpi`.`jan`,0) + coalesce(`tpi`.`feb`,0) + coalesce(`tpi`.`mar`,0) + coalesce(`tpi`.`apr`,0) + coalesce(`tpi`.`may`,0) + coalesce(`tpi`.`june`,0) + coalesce(`tpi`.`july`,0) + coalesce(`tpi`.`aug`,0) + coalesce(`tpi`.`sept`,0) + coalesce(`tpi`.`oct`,0) + coalesce(`tpi`.`nov`,0) + coalesce(`tpi`.`dec`,0)) * `tpi`.`price` from `tbl_ppmp_items` `tpi3` where `tpi3`.`id` = `tpi`.`id`)),0) from `tbl_ppmp_items` `tpi` where `tpi`.`wfp_act_per_indicator_id` in (select `twapi2`.`id` from `tbl_wfp_activity_per_indicator` `twapi2` where `twapi2`.`wfp_code` = `tw`.`code`))) AS `yearly_utilized_ppmp_actual`,coalesce((select `tpc`.`amount` from `tbl_program_conap` `tpc` where `tpc`.`year_id` = `tuba`.`year_id` and `tpc`.`program_id` = `tuba`.`program_id`),0) AS `conap` from ((((((((`tbl_wfp` `tw` join `users_profile` `up` on(`up`.`user_id` = `tw`.`user_id`)) join `users` `u` on(`u`.`id` = `tw`.`user_id`)) join `ref_units` `ru` on(`ru`.`id` = `tw`.`unit_id`)) join `tbl_unit_budget_allocation` `tuba` on(`tuba`.`unit_id` = `tw`.`unit_id`)) join `ref_year` `ry` on(`ry`.`id` = `tuba`.`year_id`)) join `ref_budget_line_item` `rbli` on(`rbli`.`id` = `tuba`.`budget_line_item_id`)) join `tbl_unit_program` `tup` on(`tup`.`program_id` = `tuba`.`program_id`)) join `ref_program` `rp` on(`rp`.`id` = `tuba`.`program_id`)) group by `tuba`.`budget_line_item_id`,`tw`.`code`)
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DROP VIEW vw_unit_budget_allocation');
    }
}
