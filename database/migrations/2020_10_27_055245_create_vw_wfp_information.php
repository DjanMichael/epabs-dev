<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwWfpInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB2::statement('
        CREATE VIEW vw_wfp_activity_information AS (
            SELECT
                `tw`.`code` AS `code`,
                `tw`.`unit_id` AS `unit_id`,
                `ru`.`section` AS `section`,
                `ru`.`division` AS `division`,
                `tw`.`user_id` AS `user_id`,
                `tw`.`year_id` AS `year_id`,
                (
                    SELECT
                        `rfd`.`class_sequence`
                    FROM
                        `ref_function_deliverables` `rfd`
                    WHERE
                        `rfd`.`id` = `twa`.`out_function`
                ) AS `class_sequence`,
                (
                    SELECT
                        `rfd`.`function_class`
                    FROM
                        `ref_function_deliverables` `rfd`
                    WHERE
                        `rfd`.`id` = `twa`.`out_function`
                ) AS `function_class`,
                lpad(`twa`.`id`, 5, 0) AS `wfp_activity_id`,
                `twa`.`id` AS `twa_id`,
                `twa`.`out_activity` AS `out_activity`,
                `twa`.`out_function` AS `out_function`,
                `twa`.activity_category_id ,
                (SELECT rac.category FROM ref_activity_category  rac WHERE rac.id = twa.activity_category_id) as `category`,
                (
                    SELECT
                        `taof`.`description`
                    FROM
                        `tbl_activity_output_function` `taof`
                    WHERE
                        `taof`.`id` = `twa`.`out_function`
                ) AS `function_description`,
                `twa`.`activity_timeframe` AS `activity_timeframe`,
                `twa`.`target_q1` AS `target_q1`,
                `twa`.`target_q2` AS `target_q2`,
                `twa`.`target_q3` AS `target_q3`,
                `twa`.`target_q4` AS `target_q4`,
                `twa`.`activity_cost` AS `activity_cost`,
                `twa`.`activity_source_of_fund` AS `activity_source_of_fund`,
                (
                    SELECT
                        `rsof`.`sof_classification`
                    FROM
                        `ref_source_of_fund` `rsof`
                    WHERE
                        `rsof`.`id` = `twa`.`activity_source_of_fund`
                ) AS `sof_classification`,
                `twa`.`responsible_person` AS `responsible_person`,
                `twa`.`encoded_by` AS `encoded_by`,
                `users`.`name` AS `name`
            FROM
                (
                    (
                        (
                            `tbl_wfp` `tw`
                            JOIN `tbl_wfp_activity` `twa` ON (
                                `twa`.`wfp_code` = `tw`.`code`
                            )
                        )
                        JOIN `ref_units` `ru` ON (`ru`.`id` = `tw`.`unit_id`)
                    )
                    JOIN `users` ON (
                        `users`.`id` = `twa`.`encoded_by`
                    )
                )
            GROUP BY
                `twa`.`id`
       )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB2::statement('DROP VIEW IF EXISTS vw_wfp_activity_information');
    }
}
