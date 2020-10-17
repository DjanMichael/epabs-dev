<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;

class CreateViewUnitProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_unit_program AS (
                SELECT
                    tup.id,
                    tup.program_id,
                    rp.program_name,
                    rp.`status` as program_status,
                    tup.unit_id,
                    ru.division,
                    ru.section,
                    tup.user_id,
                    u.`name`
                FROM
                    `tbl_unit_program` tup
                    JOIN ref_program rp ON rp.id = tup.program_id
                    JOIN ref_units ru ON ru.id = tup.unit_id
                    JOIN users u ON u.id = tup.user_id
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
        DB2::statement('vw_unit_program');
    }
}
