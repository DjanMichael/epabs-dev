<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwBudgetExpenseClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB2::statement('
         CREATE VIEW  vw_budget_expense_class AS (

            SELECT
                sum(`ds1`.`amount`) AS `total`,
                `ds1`.`category` AS `category`,
                `ds1`.`year_id` AS `year_id`
            FROM
                (
                    SELECT
                        `twapi`.`wfp_code` AS `wfp_code`,
                        trim(
                            LEADING "0"
                            FROM
                                substr(`twapi`.`wfp_code`, 7, 3)
                        ) AS `year_id`,
                        `twapi`.`uacs_id` AS `uacs_id`,
                        sum(`twapi`.`cost`) AS `amount`,
                        `ru`.`category` AS `category`,
                        `twapi`.`id` AS `id`
                    FROM
                        (
                            `tbl_wfp_activity_per_indicator` `twapi`
                            JOIN `ref_uacs` `ru` ON (
                                `ru`.`code` = `twapi`.`uacs_id`
                            )
                        )
                    GROUP BY
                        `twapi`.`id`,
                        trim(
                            LEADING "0"
                            FROM
                                substr(`twapi`.`wfp_code`, 7, 3)
                        )
                ) `ds1`
            GROUP BY
                `ds1`.`id`,
                `ds1`.`category`,
                `ds1`.`year_id`

         )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vw_budget_expense_class');
    }
}
