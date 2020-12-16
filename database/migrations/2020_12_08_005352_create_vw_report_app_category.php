<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwReportAppCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement("
        CREATE VIEW  vw_report_app_category AS (
            SELECT *
            FROM
                    (SELECT 'SUPPLIES' as `item_type`,ref_classification.* FROM ref_classification WHERE `status` ='ACTIVE'
                    UNION ALL
                    SELECT 'DRUM' as `item_type`,ref_dm_category.* FROM ref_dm_category WHERE `status` ='ACTIVE')  as dataset1
            ORDER BY dataset1.classification
        )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB2::statement('DROP VIEW IF EXISTS vw_report_app_category');
    }
}
