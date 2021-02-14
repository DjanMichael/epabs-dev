<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;

class CreateVwBudgetLineItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB2::statement('
        CREATE VIEW vw_budget_line_item AS (
            SELECT
                rbli.id,
                rbli.fund_source_id,
                rsof.sof_classification,
                rbli.budget_item,

                rp.program_name,
                ru.division,
                rbli.year_id,
                ry.`year`,
                rbli.allocation_amount,
                rbli.saa_ctrl_number,
                rbli.purpose,
                rbli.`status`
            FROM
                ref_budget_line_item rbli
                LEFT JOIN ref_year ry ON ry.id = rbli.year_id
                LEFT JOIN ref_source_of_fund rsof ON rsof.id = rbli.fund_source_id
                JOIN tbl_unit_budget_allocation tuba ON tuba.budget_line_item_id = rbli.id
                JOIN ref_program rp ON rp.id = tuba.program_id
                JOIN ref_units ru ON ru.id = tuba.unit_id

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
        //
        DB2::statement('DROP VIEW IF EXIST vw_budget_line_item');
    }
}
