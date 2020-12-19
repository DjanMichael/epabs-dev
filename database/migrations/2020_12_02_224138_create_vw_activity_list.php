<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;

class CreateVwActivityList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_activity_list AS (
                SELECT
                    tw.`code`,
                    tw.user_id,
                    tw.program_id,
                    rp.program_name,
                    tw.year_id,
                    ry.`year`,
                    twa.out_function,
                    twa.out_activity,
                    twa.responsible_person,
                    twa.activity_timeframe,
                    twa.target_q1,
                    twa.target_q2,
                    twa.target_q3,
                    twa.target_q4,
                    twa.activity_cost,
                    twapi.performance_indicator,
                    twapi.is_catering,
                    twapi.batch,
                    tpcb.pi_id,
                    tpcb.batch_no,
                    tpcb.batch_location,
                    rl.city,
                    rl.province,
                    rl.region
                FROM
                    tbl_wfp tw
                    JOIN ref_program rp ON rp.id = tw.program_id
                    JOIN ref_year ry ON ry.id = tw.year_id
                    JOIN tbl_wfp_activity twa ON twa.wfp_code = tw.`code`
                    JOIN tbl_wfp_activity_per_indicator twapi ON twapi.wfp_code = twa.wfp_code
                    JOIN tbl_pi_catering_batches tpcb ON tpcb.pi_id = twapi.id
                    JOIN ref_location rl ON rl.id = tpcb.batch_location
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
        DB2::statement('vw_activity_list');
    }
}
