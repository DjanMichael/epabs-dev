<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;

class CreateVwActivityOutputFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_activity_output_function AS (
                SELECT
                    taof.id,
                    output_function_id,
                    rfd.class_sequence,
                    rfd.function_class,
                    description,
                    program_id,
                    program_name,
                    user_id,
                    `name`,
                    taof.`status`
                FROM
                    tbl_activity_output_function as taof
                JOIN ref_function_deliverables rfd ON rfd.id = taof.output_function_id
                JOIN ref_program rp ON rp.id = taof.program_id
                JOIN users u ON u.id = taof.user_id
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
        DB2::statement('vw_activity_output_function');
    }
}
