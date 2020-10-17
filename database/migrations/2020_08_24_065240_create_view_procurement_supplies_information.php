<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;

class CreateViewProcurementSuppliesInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_procurement_supplies_information AS (
                SELECT
                    tps.id,
                    tps.description,
                    tps.unit_id,
                    riu.unit_name,
                    riu.unit_of_measure,
                    tps.classification_id,
                    rc.classification,
                    rp2.procurement_type,
                    rp.price,
                    rp.effective_date,
                    tps.fix_price,
                    tps.`status`
                FROM
                    ( SELECT MAX( effective_date ) AS effective_date, procurement_item_id, procurement_type FROM ref_price WHERE procurement_type = "SUP" GROUP BY procurement_item_id ) rp2
                    JOIN ref_price rp USING ( procurement_item_id )
                    JOIN tbl_procurement_supplies tps ON tps.id = rp.procurement_item_id
                    JOIN ref_item_unit riu ON riu.id = tps.unit_id
                    JOIN ref_classification rc ON rc.id = tps.classification_id
                    AND rp.procurement_type = "SUP"
                WHERE
                    rp.effective_date = rp2.effective_date
                GROUP BY
                    rp.procurement_item_id
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
        DB2::statement('vw_procurement_supplies_information');
    }
}
