<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwProgramsWfpStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement("
        CREATE VIEW  vw_programs_wfp_status AS (
            SELECT
                `tup`.`program_id` AS `program_id`,
                (
                    SELECT
                        `rp`.`program_name`
                    FROM
                        `ref_program` `rp`
                    WHERE
                        `rp`.`id` = `tup`.`program_id`
                ) AS `program`,
                `ry`.`id` AS `year_id`,
                `ry`.`year` AS `year`,
                `u`.`name` AS `name`,
                `up`.`designation` AS `designation`,
                (
                    SELECT
                        `tw`.`code`
                    FROM
                        `tbl_wfp` `tw`
                    WHERE
                        `tw`.`program_id` = `tup`.`program_id`
                    AND `tw`.`year_id` = `ry`.`id`
                ) AS `wfp_code`,
                (
                    SELECT
                        (
                            SELECT
                                `zwl`.`remarks`
                            FROM
                                `z_wfp_logs` `zwl`
                            WHERE
                                `zwl`.`wfp_code` = `zwl`.`wfp_code`
                            ORDER BY
                                `zwl`.`id` DESC
                            LIMIT 1
                        )
                    FROM
                        `tbl_unit_program` `tup`
                    WHERE
                        `tup`.`program_id` = substr(`wfp_code`, 10, 3)
                ) AS `wfp_status`
            FROM
                (
                    (
                        (
                            `ref_year` `ry`
                            JOIN `tbl_unit_program` `tup`
                        )
                        JOIN `users` `u` ON (`u`.`id` = `tup`.`user_id`)
                    )
                    JOIN `users_profile` `up` ON (`up`.`user_id` = `u`.`id`)
                )
        )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB2::statement('DROP VIEW IF EXISTS vw_programs_wfp_status');
    }
}
