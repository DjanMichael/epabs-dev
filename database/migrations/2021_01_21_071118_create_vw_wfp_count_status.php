<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwWfpCountStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB2::statement("
        CREATE VIEW  vw_GET_COUNT_WFP_PPMP AS (
            select trim(leading '0' from substr(`tw`.`code`,10,3)) AS `program_id`,`tw`.`code` AS `code`,`tw`.`year_id` AS `year_id`,coalesce((select count(0) from `tbl_wfp` `tw2` where `tw2`.`code` = `tw`.`code`),0) AS `isCreadtedWfp`,coalesce((select (select `zwl`.`remarks` from `z_wfp_logs` `zwl` where `zwl`.`wfp_code` = `tw2`.`code` and `zwl`.`status` = 'WFP' order by `zwl`.`id` desc limit 1) from `tbl_wfp` `tw2` where `tw2`.`code` = `tw`.`code`),'NO WFP CREATED') AS `wfp_status`,coalesce((select (select `zwl`.`remarks` from `z_wfp_logs` `zwl` where `zwl`.`wfp_code` = `tw2`.`code` and `zwl`.`status` = 'PPMP' order by `zwl`.`id` desc limit 1) from `tbl_wfp` `tw2` where `tw2`.`code` = `tw`.`code`),'NO PPMP CREATED') AS `ppmp_status` from `tbl_wfp` `tw` group by `tw`.`year_id`,`tw`.`code`
        )
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DROP VIEW IF EXIST vw_GET_COUNT_WFP_PPMP');
    }
}
