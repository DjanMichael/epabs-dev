<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVwBliSummary extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement('
            CREATE VIEW vw_bli_summary AS (
                SELECT
                    `ry`.`id` AS `id`,
                    `ry`.`year` AS `year`,
                    `rbli`.`budget_item` AS `budget_item`,
                    COALESCE (
                        (
                            SELECT
                                sum(`tuba`.`program_budget`)
                            FROM
                                `tbl_unit_budget_allocation` `tuba`
                            WHERE
                                `tuba`.`budget_line_item_id` = `rbli`.`id`
                        ),
                        0
                    ) AS `cost`
                FROM
                    (
                        (
                            `tbl_wfp_activity_per_indicator` `twapi`
                            JOIN `ref_year` `ry`
                        )
                        JOIN `ref_budget_line_item` `rbli` ON (`rbli`.`year_id` = `ry`.`id`)
                    )
                GROUP BY
                    `ry`.`year`,
                    `rbli`.`budget_item`
                ORDER BY
                    `rbli`.`budget_item`

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
        DB2::statement('DROP VIEW IF EXIST vw_bli_summary');
    }
}
