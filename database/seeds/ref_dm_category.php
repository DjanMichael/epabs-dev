<?php

use Illuminate\Database\Seeder;
use App\DrugsAndMedicine;

class ref_dm_category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DrugsAndMedicine::create(["id"=>"1", "category"=>"ANTIBIOTICS", "status"=>"ACTIVE"]);
        DrugsAndMedicine::create(["id"=>"2", "category"=>"ANTIHISTAMINE", "status"=>"ACTIVE"]);
        DrugsAndMedicine::create(["id"=>"3", "category"=>"ANTI-COUGH/ANTIASTHMA", "status"=>"ACTIVE"]);
        DrugsAndMedicine::create(["id"=>"4", "category"=>"VITAMINS & MINERALS", "status"=>"ACTIVE"]);
        DrugsAndMedicine::create(["id"=>"5", "category"=>"ANALGESIC/ANTIPYRETIC/ANTI INFLAMMATORY", "status"=>"ACTIVE"]);
        DrugsAndMedicine::create(["id"=>"6", "category"=>"GASTROINTESTINAL MEDICINES", "status"=>"ACTIVE"]);
        DrugsAndMedicine::create(["id"=>"7", "category"=>"ANTI-FIBRINOLYTIC", "status"=>"ACTIVE"]);
        DrugsAndMedicine::create(["id"=>"8", "category"=>"ANTIHYPERTENSIVE MEDICINES", "status"=>"ACTIVE"]);
        DrugsAndMedicine::create(["id"=>"9", "category"=>"ANTI-DIABETIC MEDICINES", "status"=>"ACTIVE"]);
        DrugsAndMedicine::create(["id"=>"10", "category"=>"IV FLUIDS", "status"=>"ACTIVE"]);
        DrugsAndMedicine::create(["id"=>"11", "category"=>"OTHERS", "status"=>"ACTIVE"]);
    }
}
