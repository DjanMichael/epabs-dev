<?php

use Illuminate\Database\Seeder;
use App\ActivityCategory;

class ref_activity_category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityCategory::create(["id"=>"1", "category"=>"ADMIN. EXPENSES", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"2", "category"=>"ASSISTANCE TO OTHER DOH", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"3", "category"=>"CONSULTANCY SERVICES", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"4", "category"=>"COMMODITIES", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"5", "category"=>"DRUGS AND MEDICINES", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"6", "category"=>"FREIGHT & WAREHOUSING", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"7", "category"=>"HEALTH PROMOTION - ADVOCACY", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"8", "category"=>"HUMAN RESOURCES - JOs", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"9", "category"=>"MEDICAL, DENTAL & LAB. SUPPLIES", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"10", "category"=>"MOBILIZATION FUNDS - INCENTIVES", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"11", "category"=>"ORIENTATION TO OTHER DOH", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"12", "category"=>"RESEARCH", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"13", "category"=>"TECHNICAL ASSISTANCE", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"14", "category"=>"NETWORKING AND COLLABORATION", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"15", "category"=>"TRAINING AND WORKSHOPS", "status"=>"ACTIVE"]);
        ActivityCategory::create(["id"=>"16", "category"=>"TRAINING OF DOH PERSONNEL", "status"=>"ACTIVE"]);
    }
}
