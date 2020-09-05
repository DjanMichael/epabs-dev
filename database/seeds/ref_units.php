<?php

use Illuminate\Database\Seeder;
use App\Units;

class ref_units extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Units::create(["id"=>"1", "division"=>"RD/ARD", "section"=>"RD", "status"=>"ACTIVE"]);
        Units::create(["id"=>"2", "division"=>"RD/ARD", "section"=>"ARD", "status"=>"ACTIVE"]);
        Units::create(["id"=>"3", "division"=>"RD/ARD", "section"=>"PLANNING", "status"=>"ACTIVE"]);
        Units::create(["id"=>"4", "division"=>"RD/ARD", "section"=>"STATISTICS", "status"=>"ACTIVE"]);
        Units::create(["id"=>"5", "division"=>"RD/ARD", "section"=>"RESU", "status"=>"ACTIVE"]);
        Units::create(["id"=>"6", "division"=>"RD/ARD", "section"=>"RHEMS", "status"=>"ACTIVE"]);
        Units::create(["id"=>"7", "division"=>"LHS", "section"=>"GOVERNANCE", "status"=>"ACTIVE"]);
        Units::create(["id"=>"8", "division"=>"LHS", "section"=>"SECRETARIAT", "status"=>"ACTIVE"]);
        Units::create(["id"=>"9", "division"=>"LHS", "section"=>"FHC", "status"=>"ACTIVE"]);
        Units::create(["id"=>"10", "division"=>"LHS", "section"=>"NON COMM", "status"=>"ACTIVE"]);
        Units::create(["id"=>"11", "division"=>"LHS", "section"=>"INFECTIOUS", "status"=>"ACTIVE"]);
        Units::create(["id"=>"12", "division"=>"LHS", "section"=>"TB", "status"=>"ACTIVE"]);
        Units::create(["id"=>"13", "division"=>"MSD", "section"=>"CASHIER", "status"=>"ACTIVE"]);
        Units::create(["id"=>"14", "division"=>"MSD", "section"=>"FINANCE", "status"=>"ACTIVE"]);
        Units::create(["id"=>"15", "division"=>"MSD", "section"=>"SUPPLY", "status"=>"ACTIVE"]);
        Units::create(["id"=>"16", "division"=>"MSD", "section"=>"CHIEF", "status"=>"ACTIVE"]);
        Units::create(["id"=>"17", "division"=>"HRDU", "section"=>"HRDU", "status"=>"ACTIVE"]);
        Units::create(["id"=>"18", "division"=>"MSD", "section"=>"KM-RECORDS", "status"=>"ACTIVE"]);
        Units::create(["id"=>"19", "division"=>"MSD", "section"=>"KM-HEPO", "status"=>"ACTIVE"]);
        Units::create(["id"=>"20", "division"=>"MSD", "section"=>"KM-ICT", "status"=>"ACTIVE"]);
        Units::create(["id"=>"21", "division"=>"RLED", "section"=>"RLED", "status"=>"ACTIVE"]);
        Units::create(["id"=>"22", "division"=>"RLED", "section"=>"FDA", "status"=>"ACTIVE"]);
        Units::create(["id"=>"23", "division"=>"RD/ARD", "section"=>"PDOHO", "status"=>"ACTIVE"]);
        Units::create(["id"=>"24", "division"=>"LHS", "section"=>"SDN", "status"=>"ACTIVE"]);
        Units::create(["id"=>"25", "division"=>"LHS", "section"=>"HIV", "status"=>"ACTIVE"]);
        Units::create(["id"=>"26", "division"=>"COA", "section"=>"COA", "status"=>"ACTIVE"]);
        Units::create(["id"=>"27", "division"=>"RD/ARD", "section"=>"HFEP", "status"=>"ACTIVE"]);
        Units::create(["id"=>"28", "division"=>"LHS", "section"=>"CHIEF", "status"=>"ACTIVE"]);
        Units::create(["id"=>"29", "division"=>"RD/ARD", "section"=>"LEGAL", "status"=>"ACTIVE"]);
        Units::create(["id"=>"30", "division"=>"RD/ARD", "section"=>"ISO", "status"=>"ACTIVE"]);
        Units::create(["id"=>"31", "division"=>"RD/ARD", "section"=>"RESEARCH", "status"=>"ACTIVE"]);
        Units::create(["id"=>"32", "division"=>"RD/ARD", "section"=>"FHSIS", "status"=>"ACTIVE"]);
        Units::create(["id"=>"33", "division"=>"MSD", "section"=>"HRDMU", "status"=>"ACTIVE"]);
        Units::create(["id"=>"34", "division"=>"MSD", "section"=>"PROCUREMENT", "status"=>"ACTIVE"]);
        Units::create(["id"=>"35", "division"=>"MSD", "section"=>"BUDGET", "status"=>"ACTIVE"]);
    }
}
