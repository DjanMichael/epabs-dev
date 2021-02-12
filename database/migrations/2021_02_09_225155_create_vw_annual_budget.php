<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;

class CreateVwAnnualBudget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_annual_budget AS (
                SELECT
                    tab.id,
                    tab.year_id,
                    ry.`year`,
                    tab.available_budget,
                    tab.if_conap,
                    tab.conap_year_id,
                    ry_conap.`year` as conap_year
                FROM
                    `tbl_annual_budget` tab
                    JOIN ref_year ry ON ry.id = tab.year_id
                    LEFT JOIN ref_year ry_conap ON ry.id = tab.conap_year_id 

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
        DB2::statement('DROP VIEW IF EXIST vw_annual_budget');
    }
}
