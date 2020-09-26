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
                    FORMAT(tps.price, 2) as price,
                    tps.fix_price,
                    tps.`status`
                FROM
                    `tbl_procurement_supplies` tps
                    JOIN ref_item_unit riu ON riu.id = tps.unit_id
                    JOIN ref_classification rc ON rc.id = tps.classification_id
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
