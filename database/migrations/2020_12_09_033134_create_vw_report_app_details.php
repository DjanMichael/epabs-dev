<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwReportAppDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement("
        CREATE VIEW  vw_report_app_details AS (
            SELECT
                `ry`.`id` AS `year_id`,
                `ry`.`year` AS `year`,
                `vpdsi`.`id` AS `id`,
                `vpdsi`.`item_type` AS `item_type`,
                `vpdsi`.`description` AS `description`,
                `vpdsi`.`unit_name` AS `unit_name`,
                `vpdsi`.`classification` AS `classification`,
                COALESCE (
                    (
                        SELECT
                            `rp`.`price`
                        FROM
                            `ref_price` `rp`
                        WHERE
                            `rp`.`procurement_item_id` = `vpdsi`.`id`
                        AND `rp`.`procurement_type` = `vpdsi`.`item_type`
                        AND date_format(`rp`.`effective_date`, '%Y') = `ry`.`year`
                    ),
                    0
                ) AS `price`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'January'
                ) AS `jan`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'Febuary'
                ) AS `feb`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'March'
                ) AS `mar`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'April'
                ) AS `apr`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'May'
                ) AS `may`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'June'
                ) AS `june`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'July'
                ) AS `july`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'August'
                ) AS `aug`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'September'
                ) AS `sept`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'October'
                ) AS `oct`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'November'
                ) AS `nov`,
                (
                    SELECT
                        COALESCE (sum(`tpd`.`item_qty`), 0)
                    FROM
                        `tbl_pr_details` `tpd`
                    WHERE
                        `tpd`.`item_id` = `vpdsi`.`id`
                    AND `tpd`.`item_type` = `vpdsi`.`item_type`
                    AND date_format(`tpd`.`created_at`, '%Y') = `ry`.`year`
                    AND date_format(`tpd`.`created_at`, '%M') = 'December'
                ) AS `dec`,
                (SELECT `jan` + `feb` + `mar`) AS `q1`,
                (SELECT `apr` + `may` + `june`) AS `q2`,
                (SELECT `july` + `aug` + `sept`) AS `q3`,
                (SELECT `oct` + `nov` + `dec`) AS `q4`,
                (SELECT `q1` + `q2` + `q3` + `q4`) AS `qty_total`
            FROM
                (
                    `vw_procurement_drum_supplies_items` `vpdsi`
                    JOIN `ref_year` `ry`
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
        DB2::statement('DROP VIEW IF EXISTS vw_report_app_details');
    }
}
