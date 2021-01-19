<?php

use Illuminate\Database\Seeder;
use App\GlobalSystemSettings;
class global_system_settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GlobalSystemSettings::create(["id"=>"1","user_id"=>1]);
    }
}
