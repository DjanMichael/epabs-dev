<?php

use Illuminate\Database\Seeder;
use App\User as a;
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
    }
}
