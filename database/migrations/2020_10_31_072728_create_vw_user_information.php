<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB as DB2;
class CreateVwUserInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB2::statement("
            CREATE VIEW  vw_user_information AS (
                SELECT
                    `u`.`id` AS `id`,
                    `u`.`email` AS `email`,
                    `u`.`name` AS `name`,
                    `up`.`designation` AS `designation`,
                    `u`.`role_id` AS `role_id`,
                    `tur`.`roles` AS `roles`,
                    `ry`.`id` AS `year_id`,
                    `ry`.`year` AS `year`,
                    `up`.`unit_id` AS `unit_id`,
                    `ru`.`division` AS `division`,
                    `ru`.`section` AS `section`,
                    `tup`.`program_id` AS `program_id`,
                    `rp`.`program_name` AS `program_name`
                FROM
                    (
                        (
                            (
                                (
                                    (
                                        (
                                            `users` `u`
                                            JOIN `ref_year` `ry` ON (`ry`.`year` <> `u`.`name`)
                                        )
                                        JOIN `users_profile` `up` ON (`up`.`user_id` = `u`.`id`)
                                    )
                                    JOIN `tbl_unit_program` `tup` ON (
                                        `tup`.`unit_id` = `up`.`unit_id`
                                    )
                                )
                                JOIN `ref_program` `rp` ON (
                                    `rp`.`id` = `tup`.`program_id`
                                )
                            )
                            JOIN `tbl_user_roles` `tur` ON (
                                `tur`.`role_id` = `u`.`role_id`
                            )
                        )
                        JOIN `ref_units` `ru` ON (`ru`.`id` = `up`.`unit_id`)
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
        Schema::dropIfExists('DROP VIEW vw_user_information');
    }
}
