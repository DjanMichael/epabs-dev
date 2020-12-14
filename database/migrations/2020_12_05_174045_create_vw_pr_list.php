<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwPrList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement("
        CREATE VIEW  vw_pr_list AS (
            SELECT
                `tw`.`code` AS `code`,
                `twa`.`activity_source_of_fund` AS `activity_source_of_fund`,
                `rsof`.`sof_classification` AS `sof_classification`,
                `tp`.`pr_code` AS `pr_code`,
                `tp`.`program_id` AS `program_id`,
                `rp`.`program_name` AS `program_name`,
                `tp`.`year_id` AS `year_id`,
                `ru`.`division` AS `division`,
                `ru`.`section` AS `section`,
                `u`.`name` AS `name`,
                `up`.`designation` AS `designation`,
                (
                    SELECT
                        COALESCE (
                            sum(
                                `tpd`.`item_qty` * `tpd`.`item_price`
                            ),
                            0
                        )
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`pr_code` = `tp`.`pr_code`
                ) AS `pr_cost`,
                (
                    SELECT
                        `tps`.`status`
                    FROM
                        `tbl_pr_status` `tps`
                    WHERE
                        `tps`.`pr_code` = `tp`.`pr_code`
                    ORDER BY
                        `tps`.`id` DESC
                    LIMIT 1
                ) AS `pr_status`
            FROM
                (
                    (
                        (
                            (
                                (
                                    (
                                        (
                                            (
                                                `tbl_pr` `tp`
                                                JOIN `tbl_unit_program` `tup` ON (
                                                    `tup`.`program_id` = `tp`.`program_id`
                                                )
                                            )
                                            JOIN `ref_units` `ru` ON (`ru`.`id` = `tup`.`unit_id`)
                                        )
                                        JOIN `users` `u` ON (
                                            `u`.`id` = `tp`.`prepared_user_id`
                                        )
                                    )
                                    JOIN `users_profile` `up` ON (
                                        `up`.`user_id` = `tup`.`unit_id`
                                    )
                                )
                                JOIN `tbl_wfp` `tw` ON (
                                    `tw`.`program_id` = `tp`.`program_id`
                                    AND `tw`.`year_id` = `tp`.`year_id`
                                )
                            )
                            JOIN `tbl_wfp_activity` `twa` ON (
                                `twa`.`wfp_code` = `tw`.`code`
                            )
                        )
                        JOIN `ref_source_of_fund` `rsof` ON (
                            `rsof`.`id` = `twa`.`activity_source_of_fund`
                        )
                    )
                    JOIN `ref_program` `rp` ON (
                        `rp`.`id` = `tp`.`program_id`
                    )
                )
            GROUP BY
                `tp`.`pr_code`
        )");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB2::statement('DROP VIEW IF EXISTS vw_pr_list');
    }
}
