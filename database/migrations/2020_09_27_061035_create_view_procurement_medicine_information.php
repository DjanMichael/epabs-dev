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
                    rp.price as price,
                    rp.effective_date as effective_date,
                    tpm.fix_price,
                    tpm.`status`
                FROM
                    `tbl_procurement_medicine` tpm
                    JOIN ref_item_unit riu ON riu.id = tpm.unit_id
                    JOIN ref_classification rc ON rc.id = tpm.classification_id
                    JOIN ref_price rp ON rp.procurement_item_id = tpm.id
                GROUP BY tpm.id
                ORDER BY rp.effective_date DESC
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
