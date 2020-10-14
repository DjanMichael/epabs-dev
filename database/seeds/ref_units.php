<?php

use Illuminate\Database\Seeder;
use App\RefUnits;

class ref_units extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefUnits::create(["id"=>"1", "division"=>"Administrator", "section"=>"Administrator", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"2", "division"=>"RD/ARD", "section"=>"RD", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"3", "division"=>"RD/ARD", "section"=>"ARD", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"4", "division"=>"RD/ARD", "section"=>"PLANNING", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"5", "division"=>"RD/ARD", "section"=>"STATISTICS", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"6", "division"=>"RD/ARD", "section"=>"RESU", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"7", "division"=>"RD/ARD", "section"=>"RHEMS", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"8", "division"=>"LHS", "section"=>"GOVERNANCE", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"9", "division"=>"LHS", "section"=>"SECRETARIAT", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"10", "division"=>"LHS", "section"=>"FHC", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"11", "division"=>"LHS", "section"=>"NON COMM", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"12", "division"=>"LHS", "section"=>"INFECTIOUS", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"13", "division"=>"LHS", "section"=>"TB", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"14", "division"=>"MSD", "section"=>"CASHIER", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"15", "division"=>"MSD", "section"=>"FINANCE", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"16", "division"=>"MSD", "section"=>"SUPPLY", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"17", "division"=>"MSD", "section"=>"CHIEF", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"18", "division"=>"HRDU", "section"=>"HRDU", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"19", "division"=>"MSD", "section"=>"KM-RECORDS", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"20", "division"=>"MSD", "section"=>"KM-HEPO", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"21", "division"=>"MSD", "section"=>"KM-ICT", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"22", "division"=>"RLED", "section"=>"RLED", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"23", "division"=>"RLED", "section"=>"FDA", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"24", "division"=>"RD/ARD", "section"=>"PDOHO", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"25", "division"=>"LHS", "section"=>"SDN", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"26", "division"=>"LHS", "section"=>"HIV", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"27", "division"=>"COA", "section"=>"COA", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"28", "division"=>"RD/ARD", "section"=>"HFEP", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"29", "division"=>"LHS", "section"=>"CHIEF", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"30", "division"=>"RD/ARD", "section"=>"LEGAL", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"31", "division"=>"RD/ARD", "section"=>"ISO", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"32", "division"=>"RD/ARD", "section"=>"RESEARCH", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"33", "division"=>"RD/ARD", "section"=>"FHSIS", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"34", "division"=>"MSD", "section"=>"HRDMU", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"35", "division"=>"MSD", "section"=>"PROCUREMENT", "status"=>"ACTIVE"]);
        RefUnits::create(["id"=>"36", "division"=>"MSD", "section"=>"BUDGET", "status"=>"ACTIVE"]);
    }
}
