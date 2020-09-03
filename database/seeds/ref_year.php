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
        RefYear::create(['year'=>'2020']);
        RefYear::create(['year'=>'2021']);
        
    }
}
