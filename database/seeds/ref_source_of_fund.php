<?php

use Illuminate\Database\Seeder;
use App\RefSourceOfFund;

class ref_source_of_fund extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefSourceOfFund::create(["id"=>"1", "sof_classification"=>"GAA", "status"=>"ACTIVE"]);
        RefSourceOfFund::create(["id"=>"2", "sof_classification"=>"SAA", "status"=>"ACTIVE"]);
        RefSourceOfFund::create(["id"=>"3", "sof_classification"=>"NEP", "status"=>"ACTIVE"]);
        RefSourceOfFund::create(["id"=>"4", "sof_classification"=>"CONAP", "status"=>"ACTIVE"]);
        RefSourceOfFund::create(["id"=>"5", "sof_classification"=>"GAA-CONAP", "status"=>"ACTIVE"]);
        RefSourceOfFund::create(["id"=>"6", "sof_classification"=>"SAA-CONAP", "status"=>"ACTIVE"]);
    }
}
