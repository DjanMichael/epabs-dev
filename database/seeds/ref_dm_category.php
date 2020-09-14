<?php

use Illuminate\Database\Seeder;
use App\RefDmCategory;

class ref_dm_category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefDmCategory::create(["id"=>"1", "category"=>"ANTIBIOTICS", "status"=>"ACTIVE"]);
        RefDmCategory::create(["id"=>"2", "category"=>"ANTIHISTAMINE", "status"=>"ACTIVE"]);
        RefDmCategory::create(["id"=>"3", "category"=>"ANTI-COUGH/ANTIASTHMA", "status"=>"ACTIVE"]);
        RefDmCategory::create(["id"=>"4", "category"=>"VITAMINS & MINERALS", "status"=>"ACTIVE"]);
        RefDmCategory::create(["id"=>"5", "category"=>"ANALGESIC/ANTIPYRETIC/ANTI INFLAMMATORY", "status"=>"ACTIVE"]);
        RefDmCategory::create(["id"=>"6", "category"=>"GASTROINTESTINAL MEDICINES", "status"=>"ACTIVE"]);
        RefDmCategory::create(["id"=>"7", "category"=>"ANTI-FIBRINOLYTIC", "status"=>"ACTIVE"]);
        RefDmCategory::create(["id"=>"8", "category"=>"ANTIHYPERTENSIVE MEDICINES", "status"=>"ACTIVE"]);
        RefDmCategory::create(["id"=>"9", "category"=>"ANTI-DIABETIC MEDICINES", "status"=>"ACTIVE"]);
        RefDmCategory::create(["id"=>"10", "category"=>"IV FLUIDS", "status"=>"ACTIVE"]);
        RefDmCategory::create(["id"=>"11", "category"=>"OTHERS", "status"=>"ACTIVE"]);
    }
}
