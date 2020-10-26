<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateProcedureGetPpmpPiItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::uprepared("DROP PROCEDURE IF EXISTS GET_PPMP_PI_ITEMS;
                        CREATE PROCEDURE GET_PPMP_PI_ITEMS(twapi_id INT(11))
                        BEGIN
                        SELECT
                            tpi.*,
                            dataset1.classification,
                            dataset1.description,
                            dataset1.unit_name
                            FROM tbl_ppmp_items tpi
                            JOIN vw_procurement_drum_supplies_items dataset1
                                ON dataset1.item_type = tpi.item_type AND dataset1.id = tpi.item_id
                            WHERE tpi.wfp_act_per_indicator_id = twapi_id;
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
        DB2::unprepared("DROP PROCEDURE IF EXISTS GET_PPMP_PI_ITEMS");
    }
}
