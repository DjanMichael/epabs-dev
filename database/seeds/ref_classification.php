<?php

use Illuminate\Database\Seeder;
use App\Classification;

class ref_classification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classification::create(["id"=>"1", "classification"=>"COMMON OFFICE EQUIPMENTS", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"2", "classification"=>"JANITORIAL SUPPLIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"3", "classification"=>"COMPUTER EQUIPMENTS AND ACCESSORIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"4", "classification"=>"COMPUTER CONSUMABLE SUPPLIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"5", "classification"=>"HOUSE KEEPING SUPPLIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"6", "classification"=>"INDUSTRIAL EQUIPMENTS", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"7", "classification"=>"VEHICLE REPAIR, MAINTENANCE AND MATERIALS", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"8", "classification"=>"ADVOCACY MATERIALS", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"9", "classification"=>"MEDICAL DEVICES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"10", "classification"=>"SURGICAL INSTRUMENTS", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"11", "classification"=>"CONTRACEPTIVE DEVICES AND SUPPLIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"12", "classification"=>"DRUGS AND MEDICINES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"13", "classification"=>"DENTAL SUPPLIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"14", "classification"=>"CATERING SERVICES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"15", "classification"=>"OUTSOURCING SERVICES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"16", "classification"=>"CELL CARDS", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"17", "classification"=>"FUEL, OIL AND LUBRICANTS", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"18", "classification"=>"VAN RENTALS SERVICES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"19", "classification"=>"ELECTRONIC BILLBOARD SUBSCRIPTION", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"20", "classification"=>"WAREHOUSE RENTAL", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"21", "classification"=>"PRINTER SUPPLIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"22", "classification"=>"FURNITURE AND FIXTURE", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"23", "classification"=>"LABORATORY AND MEDICAL SUPPLIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"24", "classification"=>"HANDBOOK", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"25", "classification"=>"MEDIA KIT", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"26", "classification"=>"ADVERTISEMENT", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"27", "classification"=>"NEWSPAPER SUBCRIPTION ", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"28", "classification"=>"MONITORING", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"29", "classification"=>"ACTIVITY SUPPLIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"30", "classification"=>"COMMON OFFICE DEVICES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"31", "classification"=>"COMMON OFFICE SUPPLIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"32", "classification"=>"ELECTRICAL SUPPLIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"33", "classification"=>"MANDATORY SERVICES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"34", "classification"=>"TECHNICAL SUPPORT", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"35", "classification"=>"TRAVELING EXPENSE", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"36", "classification"=>"INCENTIVES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"37", "classification"=>"REPAIR AND MAINTENANCE", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"38", "classification"=>"POSTAGE AND DELIVERIES", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"39", "classification"=>"ACCOUNTABLE FORMS", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"40", "classification"=>"SUBSCRIPTION", "status"=>"ACTIVE"]);
        Classification::create(["id"=>"41", "classification"=>"TRANSPORTATION AND DELIVERY EXPENSES", "status"=>"ACTIVE"]);
    }
}
