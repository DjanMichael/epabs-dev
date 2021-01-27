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
                    `vw`.`id` AS `id`,
                    `u`.`email` AS `email`,
                    `u`.`name` AS `name`,
                    `up`.`designation` AS `designation`,
                    `u`.`role_id` AS `role_id`,
                    `tur`.`roles` AS `roles`,
                    `ry`.`id` AS `year_id`,
                    `ry`.`year` AS `year`,
                    `vw`.`unit_id` AS `unit_id`,
                    `vw`.`division` AS `division`,
                    `vw`.`section` AS `section`,
                    `vw`.`program_id` AS `program_id`,
                    `vw`.`program_name` AS `program_name`
                FROM vw_unit_program vw
                JOIN ref_year ry
                JOIN users u ON u.id = vw.user_id
                JOIN tbl_user_roles tur ON tur.role_id = u.role_id
                JOIN users_profile up ON up.user_id=u.id
            )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vw_user_information');
    }
}
