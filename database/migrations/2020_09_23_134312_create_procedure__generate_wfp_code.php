<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateProcedureGenerateWfpCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::unprepared('
            DROP PROCEDURE IF EXISTS generate_wfp_code;
            CREATE PROCEDURE generate_wfp_code (user_id INT(11), unit_id INT(11),year_id INT(11))
            BEGIN
            SELECT CONCAT(
                 LPAD(user_id,3,0),
                 LPAD(unit_id,3,0),
                 LPAD(year_id,3,0),
                 LPAD(program_id,3,0),
                 LPAD((SELECT Count(*) + 1 FROM tbl_wfp tw where tw.`user_id`=user_id and tw.`unit_id`=unit_id and tw.`year_id`=year_id and tw.`program_id`=program_id) ,3,0)
                ) as `wfp_code`;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB2::unprepared('DROP PROCEDURE IF EXISTS generate_wfp_code');
    }
}
