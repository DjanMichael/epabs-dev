<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateProcedureGeneratePpmpCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::unprepared("DROP PROCEDURE IF EXISTS GET_PPMP_PI_ITEMS;
        CREATE PROCEDURE generate_ppmp_code(year_id INT(11),program_id INT(11))
            BEGIN
                SELECT CONCAT(
                        LPAD(year_id,3,0),
                        LPAD(program_id,3,0),
                        LPAD((SELECT Count(*) + 1 FROM tbl_pr tp where tp.program_id = program_id and tp.`year_id`=year_id) ,3,0)
                        ) as `ppmp_code`;
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
        DB2::unprepared("DROP PROCEDURE IF EXISTS generate_ppmp_code");
    }
}
