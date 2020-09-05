<?php

use Illuminate\Database\Seeder;
use App\SourceOfFund;

class ref_source_of_fund extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SourceOfFund::create(["id"=>"1", "sof_classification"=>"NEP", "status"=>"ACTIVE"]);
        SourceOfFund::create(["id"=>"2", "sof_classification"=>"GAA", "status"=>"ACTIVE"]);
    }
}
