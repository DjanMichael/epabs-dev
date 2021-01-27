<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwProgramsWfpStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement("
        CREATE VIEW  vw_programs_wfp_status AS (
          (select `ry`.`year` AS `year`,`ry`.`id` AS `year_id_source`,(select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`) AS `code`,trim(leading '0' from substr((select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`),1,3)) AS `user_id`,trim(leading '0' from substr((select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`),4,3)) AS `unit_id`,trim(leading '0' from substr((select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`),7,3)) AS `year_id`,trim(leading '0' from substr((select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`),10,3)) AS `program_id`,trim(leading '0' from substr((select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`),13,3)) AS `wfp_id`,(select `ref_program`.`program_name` from `ref_program` where `ref_program`.`id` = trim(leading '0' from substr((select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`),10,3))) AS `program`,(select `users`.`name` from `users` where `users`.`id` = trim(leading '0' from substr((select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`),1,3))) AS `name`,(select `users_profile`.`designation` from `users_profile` where `users_profile`.`user_id` = trim(leading '0' from substr((select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`),1,3))) AS `designation`,(select (select `zwl`.`remarks` from `z_wfp_logs` `zwl` where `zwl`.`wfp_code` = `zwl`.`wfp_code` and `zwl`.`status` = 'WFP' order by `zwl`.`id` desc limit 1) from `tbl_unit_program` `tup` where `tup`.`program_id` = substr((select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`),10,3)) AS `wfp_status`,(select (select `zwl`.`remarks` from `z_wfp_logs` `zwl` where `zwl`.`wfp_code` = `zwl`.`wfp_code` and `zwl`.`status` = 'PPMP' order by `zwl`.`id` desc limit 1) from `tbl_unit_program` `tup` where `tup`.`program_id` = substr((select `tw2`.`code` from `tbl_wfp` `tw2` where `tw2`.`year_id` = `ry`.`id` and `tw2`.`code` = `tbl_wfp`.`code`),10,3)) AS `ppmp_status` from (`tbl_wfp` join `ref_year` `ry`))
        )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB2::statement('DROP VIEW IF EXISTS vw_programs_wfp_status');
    }
}
