<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateViewUnitBudgetAllocationInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW  vw_unit_budget_allocation AS (
                SELECT
                up.user_id,
                u.`name`,
                up.designation,
                ru.division,
                ru.section,
                tuba.unit_id,
                tuba.budget_line_item_id,
                tuba.year_id,
                ry.`year`,
                (SELECT `code` FROM tbl_wfp as tw WHERE  tw.user_id =up.user_id AND tw.year_id = tuba.year_id AND tw.unit_id = up.unit_id) as `wfp_code`,
                tuba.program_budget as program_budget,
                (
                SELECT
                    (SELECT
                        COALESCE(SUM((SELECT
                                        (COALESCE(tpi.jan,0) + COALESCE(tpi.feb,0) + COALESCE(tpi.mar,0) + COALESCE(tpi.apr,0) +
                                            COALESCE(tpi.may,0) + COALESCE(tpi.june,0) + COALESCE(tpi.july,0) + COALESCE(tpi.aug,0) +
                                            COALESCE(tpi.sept,0) + COALESCE(tpi.oct,0) + COALESCE(tpi.nov,0) + COALESCE(tpi.`dec`,0)
                                            ) * tpi.price
                                FROM tbl_ppmp_items as tpi WHERE tpi.wfp_act_per_indicator_id = twapi.id )
                        ),0)
                        FROM tbl_wfp_activity_per_indicator as twapi WHERE twapi.wfp_code = `code` AND twapi.bli_id = tuba.budget_line_item_id
                    )
                FROM tbl_wfp as tw WHERE  tw.user_id = up.user_id AND tw.year_id = tuba.year_id AND tw.unit_id = up.unit_id
                ) as `utilized`,
                COALESCE(tuba.program_budget - (
                SELECT
                    (SELECT
                        COALESCE(SUM((SELECT
                                        (COALESCE(tpi.jan,0) + COALESCE(tpi.feb,0) + COALESCE(tpi.mar,0) + COALESCE(tpi.apr,0) +
                                            COALESCE(tpi.may,0) + COALESCE(tpi.june,0) + COALESCE(tpi.july,0) + COALESCE(tpi.aug,0) +
                                            COALESCE(tpi.sept,0) + COALESCE(tpi.oct,0) + COALESCE(tpi.nov,0) + COALESCE(tpi.`dec`,0)
                                            ) * tpi.price
                                FROM tbl_ppmp_items as tpi WHERE tpi.wfp_act_per_indicator_id = twapi.id)
                                ),0)
                        FROM tbl_wfp_activity_per_indicator as twapi WHERE twapi.wfp_code = `code` AND twapi.bli_id = tuba.budget_line_item_id)
                FROM tbl_wfp as tw WHERE  tw.user_id = up.user_id AND tw.year_id = tuba.year_id AND tw.unit_id = up.unit_id

                ),0) as `balance`
                FROM users_profile as up
                JOIN users as u ON u.id = up.user_id
                JOIN ref_units as ru ON ru.id = up.unit_id
                JOIN tbl_unit_budget_allocation as tuba ON tuba.unit_id  = up.unit_id
                JOIN ref_year as ry ON ry.id = tuba.year_id
                JOIN tbl_wfp_activity_per_indicator as twapi ON twapi.wfp_code = wfp_code
                GROUP BY tuba.year_id,up.unit_id,tuba.budget_line_item_id
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
        Schema::dropIfExists('DROP VIEW IF EXISTS vw_unit_budget_allocation');
    }
}
