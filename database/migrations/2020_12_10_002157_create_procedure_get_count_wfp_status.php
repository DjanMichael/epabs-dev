<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateProcedureGetCountWfpStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::unprepared("DROP PROCEDURE IF EXISTS GET_PPMP_PI_ITEMS;
        CREATE PROCEDURE GET_COUNT_WFP_STATUS(year_id INT(11))
        BEGIN
            SELECT
                tuba.program_id,
                (
                    COALESCE(
                        (SELECT
                                1
                        FROM tbl_wfp tw
                        WHERE tw.program_id = tuba.program_id
                        AND tw.year_id = year_id)
                    , 0)
                ) as `isCreadtedWfp`,
                (
                    COALESCE(
                        (SELECT
                            (
                                SELECT zwl.remarks
                                FROM z_wfp_logs zwl
                                WHERE zwl.wfp_code =  tw.`code`
                                ORDER BY zwl.id DESC LIMIT 1
                            )
                        FROM tbl_wfp tw
                        WHERE tw.program_id = tuba.program_id
                        AND tw.year_id = year_id)
                    , 'NO WFP CREATED')
                ) as `wfp_status`
            FROM tbl_unit_budget_allocation tuba
            JOIN tbl_unit_program tup ON tup.program_id = tuba.program_id
            GROUP BY tuba.program_id;
        END;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB2::unprepared("DROP PROCEDURE IF EXISTS GET_COUNT_WFP_STATUS");
    }
}
