<?php

use Illuminate\Database\Seeder;
use App\User as a;
use App\UserProfile;
class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        a::create(['name'=>'Administrator','email'=>'admin@admin.com','password'=>bcrypt('admin123'),'username'=>'admin','role_id'=>'-1']);
        UserProfile::create(['user_id'=> 1,'contact'=>'99999999','designation'=>'ADMINISTRATOR','unit_id'=>1]);
    }
}
