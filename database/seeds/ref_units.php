<?php

use Illuminate\Database\Seeder;
use App\RefUnit;
class ref_units extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'RD']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'ARD']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'PLANNING']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'STATISTICS']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'RESU']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'RHEMS']);
        RefUnit::create(['division'=>'LHS', 'section'=>'GOVERNANCE']);
        RefUnit::create(['division'=>'LHS', 'section'=>'SECRETARIAT']);
        RefUnit::create(['division'=>'LHS', 'section'=>'FHC']);
        RefUnit::create(['division'=>'LHS', 'section'=>'NON COMM']);
        RefUnit::create(['division'=>'LHS', 'section'=>'INFECTIOUS']);
        RefUnit::create(['division'=>'LHS', 'section'=>'TB']);
        RefUnit::create(['division'=>'MSD', 'section'=>'CASHIER']);
        RefUnit::create(['division'=>'MSD', 'section'=>'FINANCE']);
        RefUnit::create(['division'=>'MSD', 'section'=>'SUPPLY']);
        RefUnit::create(['division'=>'MSD', 'section'=>'CHIEF']);
        RefUnit::create(['division'=>'HRDU', 'section'=>'HRDU']);
        RefUnit::create(['division'=>'MSD', 'section'=>'KM-RECORDS']);
        RefUnit::create(['division'=>'MSD', 'section'=>'KM-HEPO']);
        RefUnit::create(['division'=>'MSD', 'section'=>'KM-ICT']);
        RefUnit::create(['division'=>'RLED', 'section'=>'RLED']);
        RefUnit::create(['division'=>'RLED', 'section'=>'FDA']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'PDOHO']);
        RefUnit::create(['division'=>'LHS', 'section'=>'SDN']);
        RefUnit::create(['division'=>'LHS', 'section'=>'HIV']);
        RefUnit::create(['division'=>'COA', 'section'=>'COA']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'HFEP']);
        RefUnit::create(['division'=>'LHS', 'section'=>'CHIEF']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'LEGAL']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'ISO']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'RESEARCH']);
        RefUnit::create(['division'=>'RD/ARD', 'section'=>'FHSIS']);
        RefUnit::create(['division'=>'MSD', 'section'=>'HRDMU']);
        RefUnit::create(['division'=>'MSD', 'section'=>'PROCUREMENT']);
        RefUnit::create(['division'=>'MSD', 'section'=>'BUDGET']);

    }
}
