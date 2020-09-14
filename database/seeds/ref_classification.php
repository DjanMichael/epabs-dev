<?php

use Illuminate\Database\Seeder;
use App\RefClassification;

class ref_classification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefClassification::create(["id"=>"1", "classification"=>"COMMON OFFICE EQUIPMENTS", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"2", "classification"=>"JANITORIAL SUPPLIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"3", "classification"=>"COMPUTER EQUIPMENTS AND ACCESSORIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"4", "classification"=>"COMPUTER CONSUMABLE SUPPLIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"5", "classification"=>"HOUSE KEEPING SUPPLIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"6", "classification"=>"INDUSTRIAL EQUIPMENTS", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"7", "classification"=>"VEHICLE REPAIR, MAINTENANCE AND MATERIALS", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"8", "classification"=>"ADVOCACY MATERIALS", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"9", "classification"=>"MEDICAL DEVICES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"10", "classification"=>"SURGICAL INSTRUMENTS", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"11", "classification"=>"CONTRACEPTIVE DEVICES AND SUPPLIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"12", "classification"=>"DRUGS AND MEDICINES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"13", "classification"=>"DENTAL SUPPLIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"14", "classification"=>"CATERING SERVICES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"15", "classification"=>"OUTSOURCING SERVICES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"16", "classification"=>"CELL CARDS", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"17", "classification"=>"FUEL, OIL AND LUBRICANTS", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"18", "classification"=>"VAN RENTALS SERVICES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"19", "classification"=>"ELECTRONIC BILLBOARD SUBSCRIPTION", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"20", "classification"=>"WAREHOUSE RENTAL", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"21", "classification"=>"PRINTER SUPPLIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"22", "classification"=>"FURNITURE AND FIXTURE", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"23", "classification"=>"LABORATORY AND MEDICAL SUPPLIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"24", "classification"=>"HANDBOOK", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"25", "classification"=>"MEDIA KIT", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"26", "classification"=>"ADVERTISEMENT", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"27", "classification"=>"NEWSPAPER SUBCRIPTION ", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"28", "classification"=>"MONITORING", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"29", "classification"=>"ACTIVITY SUPPLIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"30", "classification"=>"COMMON OFFICE DEVICES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"31", "classification"=>"COMMON OFFICE SUPPLIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"32", "classification"=>"ELECTRICAL SUPPLIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"33", "classification"=>"MANDATORY SERVICES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"34", "classification"=>"TECHNICAL SUPPORT", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"35", "classification"=>"TRAVELING EXPENSE", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"36", "classification"=>"INCENTIVES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"37", "classification"=>"REPAIR AND MAINTENANCE", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"38", "classification"=>"POSTAGE AND DELIVERIES", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"39", "classification"=>"ACCOUNTABLE FORMS", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"40", "classification"=>"SUBSCRIPTION", "status"=>"ACTIVE"]);
        RefClassification::create(["id"=>"41", "classification"=>"TRANSPORTATION AND DELIVERY EXPENSES", "status"=>"ACTIVE"]);
    }
}
