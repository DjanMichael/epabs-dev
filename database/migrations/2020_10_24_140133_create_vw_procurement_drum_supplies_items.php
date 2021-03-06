<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwProcurementDrumSuppliesItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement("
            CREATE VIEW  vw_procurement_drum_supplies_items AS (
                SELECT
                    'DRUM' AS `item_type`,
                    `tpm`.`id` AS `id`,
                    `tpm`.`description` AS `description`,
                    `tpm`.`strength` AS `strength`,
                    `tpm`.`unit_id` AS `unit_id`,
                    `riu`.`unit_name` AS `unit_name`,
                    `tpm`.`status` AS `status`,
                    `tpm`.`fix_price` AS `fix_price`,
                    `tpm`.`classification_id` AS `classification_id`,
                    `rc`.`classification` AS `classification`,
                    (
                        SELECT
                            `rp`.`price`
                        FROM
                            `ref_price` `rp`
                        WHERE
                            `rp`.`procurement_item_id` = `tpm`.`id`
                        AND `rp`.`procurement_type` = 'DRUM'
                        AND date_format(`rp`.`effective_date`, '%Y') = `ry`.`year`
                    ) AS `price`,
                    `ry`.`year` AS `year`,
                    `ry`.`id` AS `year_id`,
                    (
                        SELECT
                            `rdc`.`category`
                        FROM
                            `ref_dm_category` `rdc`
                        WHERE
                            `rdc`.`id` = `tpm`.`category_id`
                    ) AS `drum_category`
                FROM
                    (
                        (
                            (
                                `tbl_procurement_medicine` `tpm`
                                JOIN `ref_classification` `rc` ON (
                                    `rc`.`id` = `tpm`.`classification_id`
                                )
                            )
                            JOIN `ref_item_unit` `riu` ON (`riu`.`id` = `tpm`.`unit_id`)
                        )
                        JOIN `ref_year` `ry`
                    )
                UNION ALL
                    SELECT
                        'SUPPLIES' AS `item_type`,
                        `tps`.`id` AS `id`,
                        `tps`.`description` AS `description`,
                        '' AS `strength`,
                        `tps`.`unit_id` AS `unit_id`,
                        `riu`.`unit_name` AS `unit_name`,
                        `tps`.`status` AS `status`,
                        `tps`.`fix_price` AS `fix_price`,
                        `tps`.`classification_id` AS `classification_id`,
                        `rc`.`classification` AS `classification`,
                        (
                            SELECT
                                `rp`.`price`
                            FROM
                                `ref_price` `rp`
                            WHERE
                                `rp`.`procurement_item_id` = `tps`.`id`
                            AND `rp`.`procurement_type` = 'SUPPLIES'
                            AND date_format(`rp`.`effective_date`, '%Y') = `ry`.`year`
                        ) AS `price`,
                        `ry`.`year` AS `year`,
                        `ry`.`id` AS `year_id`,
                        '' AS `drum_category`
                    FROM
                        (
                            (
                                (
                                    `tbl_procurement_supplies` `tps`
                                    JOIN `ref_classification` `rc` ON (
                                        `rc`.`id` = `tps`.`classification_id`
                                    )
                                )
                                JOIN `ref_item_unit` `riu` ON (`riu`.`id` = `tps`.`unit_id`)
                            )
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
        Schema::dropIfExists('vw_procurement_drum_supplies_items');
    }
}
