<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateViewWfpInformation extends Migration
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
            (
                SELECT
                    `tw`.`code` AS `code`,
                    `tw`.`unit_id` AS `unit_id`,
                    `tw`.`user_id` AS `user_id`,
                    `tw`.`year_id` AS `year_id`,
                    
                    `rfd`.`class_sequence` AS `class_sequence`,
                    `rfd`.`function_class` AS `function_class`,
                    lpad(
                        `twa`.`wfp_activity_id`,
                        5,
                        0
                    ) AS `wfp_activity_id`,
                    `twa`.`out_activity` AS `out_activity`,
                    `twa`.`out_function` AS `out_function`,
                    `taof`.`function_description` AS `function_description`,
                    `twa`.`activity_timeframe` AS `twa.activity_timeframe`,
                    `twa`.`target_q1` AS `target_q1`,
                    `twa`.`target_q2` AS `target_q2`,
                    `twa`.`target_q3` AS `target_q3`,
                    `twa`.`target_q4` AS `target_q4`,
                    `twa`.`activity_cost` AS `activity_cost`,
                    `twa`.`activity_source_of_fund` AS `activity_source_of_fund`,
                    `rsof`.`sof_classification` AS `sof_classification`,
                    `twa`.`responsible_person` AS `responsible_person`,
                    `twa`.`encoded_by` AS `encoded_by`,
                    `users`.`name` AS `name`
                FROM
                    (
                        (
                            (
                                (
                                    (
                                        (
                                            `tbl_wfp` `tw`
                                            JOIN `tbl_wfp_activity` `twa` ON (
                                                `twa`.`wfp_code` = `tw`.`code`
                                            )
                                        )
                                        JOIN `tbl_wfp_activity_per_indicator` `twapi` ON (
                                            `twapi`.`wfp_code` = `tw`.`code`
                                        )
                                    )
                                    JOIN `ref_function_deliverables` `rfd` ON (
                                        `rfd`.`id` = `twa`.`out_function`
                                    )
                                )
                                JOIN `tbl_activity_output_function` `taof` ON (
                                    `taof`.`id` = `twa`.`out_function`
                                )
                            )
                            JOIN `ref_source_of_fund` `rsof` ON (
                                `rsof`.`id` = `twa`.`activity_source_of_fund`
                            )
                        )
                        JOIN `users` ON (
                            `users`.`id` = `twa`.`encoded_by`
                        )
                    )
                GROUP BY
                    `tw`.`unit_id`,
                    `tw`.`year_id`,
                    `twa`.`wfp_activity_id`
                ORDER BY
                    `rfd`.`class_sequence`
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
        DB2::statement('DROP VIEW IF EXISTS vw_wfp_activity_information');
    }
}
