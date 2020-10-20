<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;

class CreateViewProcurementMedicineInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_procurement_medicine_information AS (
                SELECT
                    tpm.id,
                    tpm.description,
                    tpm.unit_id,
                    riu.unit_name,
                    riu.unit_of_measure,
                    tpm.classification_id,
                    rc.classification,
                    tpm.category_id,
                    rdmc.category,
                    rp2.procurement_type,
                    rp.price,
                    rp.effective_date,
                    tpm.fix_price,
                    tpm.`status`
                FROM
                    ( SELECT MAX( effective_date ) AS effective_date, procurement_item_id, procurement_type FROM ref_price WHERE procurement_type = "MED" GROUP BY procurement_item_id ) rp2
                    JOIN ref_price rp USING ( procurement_item_id )
                    JOIN tbl_procurement_medicine tpm ON tpm.id = rp.procurement_item_id
                    JOIN ref_item_unit riu ON riu.id = tpm.unit_id
                    JOIN ref_classification rc ON rc.id = tpm.classification_id
                    JOIN ref_dm_category rdmc ON rdmc.id = tpm.category_id
                    AND rp.procurement_type = "MED"
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
