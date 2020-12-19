<?php

use Illuminate\Database\Seeder;
use App\UserRoles;

class tbl_user_roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRoles::create(['role_id'=>'-1','roles'=>'ADMINISTRATOR']);
        UserRoles::create(['role_id'=>'1','roles'=>'PLANNING']);
        UserRoles::create(['role_id'=>'2','roles'=>'BUDGET']);
        UserRoles::create(['role_id'=>'3','roles'=>'PROGRAM COORDINATOR']);
        UserRoles::create(['role_id'=>'4','roles'=>'PROCUREMENT']);
        UserRoles::create(['role_id'=>'5','roles'=>'PHARMACY']);
    }
}
