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
        RefSourceOfFund::create(['sof_classification' => 'NEP', 'status'=>'ACTIVE']);
        RefSourceOfFund::create(['sof_classification' => 'GAA', 'status'=>'ACTIVE']);
    }
}
