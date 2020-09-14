<?php

use Illuminate\Database\Seeder;
use App\RefYear;
class ref_year extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefYear::create(["id"=>"1", "year"=>"2016", "status"=>"ACTIVE"]);
        RefYear::create(["id"=>"2", "year"=>"2017", "status"=>"ACTIVE"]);
        RefYear::create(["id"=>"3", "year"=>"2018", "status"=>"ACTIVE"]);
        RefYear::create(["id"=>"4", "year"=>"2019", "status"=>"ACTIVE"]);
        RefYear::create(["id"=>"5", "year"=>"2020", "status"=>"ACTIVE"]);
        RefYear::create(["id"=>"6", "year"=>"2021", "status"=>"ACTIVE"]);
    }
}
