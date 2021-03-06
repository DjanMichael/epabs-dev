<?php

use Illuminate\Database\Seeder;
use App\RefUacs;
class ref_uacs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefUacs::create(["id"=>"1", "category"=>"PERSONNEL SERVICES", "subcategory"=>"SALARIES AND WAGES - REGULAR", "title"=>"BASIC SALARY- CIVILIAN", "code"=>"5010101001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"2", "category"=>"PERSONNEL SERVICES", "subcategory"=>"SALARIES AND WAGES - REGULAR", "title"=>"SALARIES AND WAGES - CASUAL/ CONTRACTUAL", "code"=>"5010102000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"3", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER COMPENSATION", "title"=>"PERA-CIVILIAN", "code"=>"5010201001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"4", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER COMPENSATION", "title"=>"REPRESENTATION ALLOWANCE (RA)", "code"=>"5010202000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"5", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER COMPENSATION", "title"=>"TRANSPORTATION ALLOWANCE (TA)", "code"=>"5010203001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"6", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER COMPENSATION", "title"=>"CLOTHING/UNIFORM ALLOWANCE- CIVILIAN", "code"=>"5010204001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"7", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER COMPENSATION", "title"=>"SUBSISTENCE ALLOWANCE- MAGNA CARTA BENEFITS FOR PUBLIC HEALTH WORKERS UNDER R.A. 7305", "code"=>"5010205003", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"8", "category"=>"PERSONNEL SERVICES", "subcategory"=>"LAUNDRY ALLOWANCE", "title"=>"LAUNDRY ALLOWANCE-CIVILIAN", "code"=>"5010206001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"9", "category"=>"PERSONNEL SERVICES", "subcategory"=>"LAUNDRY ALLOWANCE", "title"=>"LAUNDRY ALLOWANCE- MAGNA CARTA BENEFITS FOR PUBLIC HEALTH WORKERS UNDER R.A. 7305", "code"=>"5010206004", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"10", "category"=>"PERSONNEL SERVICES", "subcategory"=>"QUARTERS ALLOWANCE", "title"=>"QUARTERS ALLOWANCE-CIVILIAN", "code"=>"5010207001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"11", "category"=>"PERSONNEL SERVICES", "subcategory"=>"QUARTERS ALLOWANCE", "title"=>"QUARTERS ALLOWANCE- MAGNA CARTA BENEFITS FOR PUBLIC HEALTH WORKERS UNDER R.A. 7305", "code"=>"5010207004", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"12", "category"=>"PERSONNEL SERVICES", "subcategory"=>"QUARTERS ALLOWANCE", "title"=>"PRODUCTIVITY INCENTIVE ALLOWANCE- CIVILIAN", "code"=>"5010208001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"13", "category"=>"PERSONNEL SERVICES", "subcategory"=>"QUARTERS ALLOWANCE", "title"=>"OVERSEAS ALLOWANCE-CIVILIAN", "code"=>"5010209001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"14", "category"=>"PERSONNEL SERVICES", "subcategory"=>"HONORARIA", "title"=>"HONORARIA- CIVILIAN", "code"=>"5010210001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"15", "category"=>"PERSONNEL SERVICES", "subcategory"=>"HONORARIA", "title"=>"HONORARIA- MAGNA CARTA BENEFITS FOR PUBLIC HEALTH WORKERS UNDER R.A. 7305", "code"=>"5010210004", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"16", "category"=>"PERSONNEL SERVICES", "subcategory"=>"HAZARD PAY (HP)", "title"=>"HAZARD PAY", "code"=>"5010211001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"17", "category"=>"PERSONNEL SERVICES", "subcategory"=>"HAZARD PAY (HP)", "title"=>"HP- MAGNA CARTA BENEFITS FOR PUBLIC HEALTH WORKERS UNDER R.A. 7305", "code"=>"5010211005", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"18", "category"=>"PERSONNEL SERVICES", "subcategory"=>"LONGEVITY PAY", "title"=>"LONGEVITY PAY- CIVILIAN", "code"=>"5010212001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"19", "category"=>"PERSONNEL SERVICES", "subcategory"=>"LONGEVITY PAY", "title"=>"LONGEVITY PAY- MAGNA CARTA BENEFITS FOR PUBLIC HEALTH WORKERS UNDER R.A. 7305", "code"=>"5010212004", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"20", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OVERTIME AND NIGHT PAY", "title"=>"OVERTIME PAY", "code"=>"5010213001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"21", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OVERTIME AND NIGHT PAY", "title"=>"NIGHT-SHIFT DIFFERENTIAL PAY", "code"=>"5010213002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"22", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OVERTIME AND NIGHT PAY", "title"=>"BONUS- CIVILIAN", "code"=>"5010214001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"23", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OVERTIME AND NIGHT PAY", "title"=>"CASH GIFT- CIVILIAN", "code"=>"5010215001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"24", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER BONUSES AND ALLOWANCES", "title"=>"PER DIEMS- CIVILIAN", "code"=>"5010299001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"25", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER BONUSES AND ALLOWANCES", "title"=>"PRODUCTIVITY ENHANCEMENT INCENTIVE- CIVILIAN", "code"=>"5010299012", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"26", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER BONUSES AND ALLOWANCES", "title"=>"PERFORMANCE BASED BONUS- CIVILIAN", "code"=>"5010299014", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"27", "category"=>"PERSONNEL SERVICES", "subcategory"=>"PERSONNEL BENEFIT CONTRIBUTIONS", "title"=>"RETIREMENT AND LIFE INSURANCE PREMIUMS", "code"=>"5010301000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"28", "category"=>"PERSONNEL SERVICES", "subcategory"=>"PERSONNEL BENEFIT CONTRIBUTIONS", "title"=>"PAG-IBIG- CIVILIAN", "code"=>"5010302001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"29", "category"=>"PERSONNEL SERVICES", "subcategory"=>"PERSONNEL BENEFIT CONTRIBUTIONS", "title"=>"PHILHEALTH- CIVILIAN", "code"=>"5010303001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"30", "category"=>"PERSONNEL SERVICES", "subcategory"=>"PERSONNEL BENEFIT CONTRIBUTIONS", "title"=>"ECIP- CIVILIAN", "code"=>"5010304001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"31", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"PENSION BENEFITS- CIVILIAN", "code"=>"5010401001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"32", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"RETIREMENT AND GRATUITY- CIVILIAN", "code"=>"5010402001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"33", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"TERMINAL LEAVE BENEFITS- CIVILIAN", "code"=>"5010403001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"34", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"LUMP-SUM FOR CREATION OF NEW POSITIONS- CIVILIAN", "code"=>"5010499001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"35", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"LUMP-SUM FOR RECLASSIFICATION OF POSITIONS", "code"=>"5010499003", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"36", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"LUMP-SUM FOR COMPENSATION ADJUSTMENT", "code"=>"5010499006", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"37", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"LUMP-SUM FOR FILLING OF POSITIONS", "code"=>"5010499007", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"38", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"LUMP-SUM FOR NBC NO. 308", "code"=>"5010499008", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"39", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"LUMP-SUM FOR PERSONNEL SERVICES", "code"=>"5010499009", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"40", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"LUMP-SUM FOR STEP INCREMENTS- LENGTH OF SERVICE", "code"=>"5010499010", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"41", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"OTHER LUMP-SUM", "code"=>"5010499012", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"42", "category"=>"PERSONNEL SERVICES", "subcategory"=>"OTHER PERSONNEL BENEFITS ", "title"=>"OTHER PERSONNEL BENEFITS", "code"=>"5010499099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"43", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"TRAVELING EXPENSES", "title"=>"TRAVEL EXPENSES-LOCAL", "code"=>"5020101000 ", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"44", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"TRAVELING EXPENSES", "title"=>"TRAVEL EXPENSES-FOREIGN", "code"=>"5020102000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"45", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"TRAINING AND SCHOLARSHIP EXPENSES", "title"=>"TRAINING EXPENSES", "code"=>"5020201000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"46", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"TRAINING AND SCHOLARSHIP EXPENSES", "title"=>"SCHOLARSHIP GRANTS/ EXPENSES", "code"=>"5020202000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"47", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"OFFICE SUPPLIES EXPENSES", "code"=>"5020301000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"48", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"ACCOUNTABLE FORMS EXPENSES", "code"=>"5020302000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"49", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"NON-ACCOUNTABLE FORMS EXPENSES", "code"=>"5020303000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"50", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"ANIMAL/ZOOLOGICAL SUPPLIES EXPENSES", "code"=>"5020304000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"51", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"FOOD SUPPLIES EXPENSES", "code"=>"5020305000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"52", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"WELFARE GOODS EXPENSES", "code"=>"5020306000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"53", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"DRUGS AND MEDICINES EXPENSES", "code"=>"5020307000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"54", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"MEDICAL, DENTAL AND LABORATORY SUPPLIES EXPENSES", "code"=>"5020308000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"55", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"FUEL, OIL AND LUBRICANTS EXPENSES ", "code"=>"5020309000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"56", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"AGRICULTURAL SUPPLIES EXPENSES", "code"=>"5020310000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"57", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"TEXTBOOKS AND INSTRUCTIONAL MATERIALS EXPENSES", "code"=>"5020311001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"58", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SUPPLIES AND MATERIALS EXPENSES", "title"=>"OTHER SUPPLIES AND MATERIALS EXPENSES", "code"=>"5020399000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"59", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"UTILITY EXPENSES", "title"=>"WATER EXPENSES", "code"=>"5020401000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"60", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"UTILITY EXPENSES", "title"=>"ELECTRICITY EXPENSES", "code"=>"5020402000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"61", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"COMMUNICATION EXPENSES", "title"=>"POSTAGE AND COURIER SERVICES", "code"=>"5020501000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"62", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"COMMUNICATION EXPENSES", "title"=>"TELEPHONE- LANDLINE", "code"=>"5020502001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"63", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"COMMUNICATION EXPENSES", "title"=>"TELEPHONE- MOBILE", "code"=>"5020502002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"64", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"COMMUNICATION EXPENSES", "title"=>"INTERNET SUBSCRIPTION EXPENSES", "code"=>"5020503000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"65", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"COMMUNICATION EXPENSES", "title"=>"CABLE, SATELLITE, TELEGRAPH AND RADIO EXPENSES", "code"=>"5020504000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"66", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"AWARDS/REWARDS AND PRIZES", "title"=>"AWARDS/ REWARDS EXPENSES", "code"=>"5020601001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"67", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"AWARDS/REWARDS AND PRIZES", "title"=>"REWARDS AND INCENTIVES", "code"=>"5020601002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"68", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"AWARDS/REWARDS AND PRIZES", "title"=>"PRIZES", "code"=>"5020602000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"69", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SURVEY, RESEARCH, EXPLORATION AND DEVELOPMENT EXPENSES", "title"=>"SURVEY EXPENSES", "code"=>"5020701000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"70", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"SURVEY, RESEARCH, EXPLORATION AND DEVELOPMENT EXPENSES", "title"=>"RESEARCH, EXPLORATION AND DEVELOPMENT EXPENSES", "code"=>"5020702000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"71", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"CONFIDENTIAL, INTELLIGENCE AND EXTRAORDINARY EXPENSES ", "title"=>"CONFIDENTIAL EXPENSES", "code"=>"5021001000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"72", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"CONFIDENTIAL, INTELLIGENCE AND EXTRAORDINARY EXPENSES ", "title"=>"INTELLIGENCE EXPENSES", "code"=>"5021002000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"73", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"CONFIDENTIAL, INTELLIGENCE AND EXTRAORDINARY EXPENSES ", "title"=>"EXTRAORDINARY AND MISCELLANEOUS EXPENSES", "code"=>"5021003000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"74", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"PROFESSIONAL SERVICES", "title"=>"LEGAL SERVICES", "code"=>"5021101000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"75", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"PROFESSIONAL SERVICES", "title"=>"AUDITING SERVICES", "code"=>"5021102000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"76", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"PROFESSIONAL SERVICES", "title"=>"CONSULTANCY SERVICES", "code"=>"5021103000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"77", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"PROFESSIONAL SERVICES", "title"=>"OTHER PROFESSIONAL SERVICES", "code"=>"5021199000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"78", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"GENERAL SERVICES", "title"=>"ENVIRONMENT/SANITARY SERVICES", "code"=>"5021201000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"79", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"GENERAL SERVICES", "title"=>"JANITORIAL SERVICES", "code"=>"5021202000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"80", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"GENERAL SERVICES", "title"=>"SECURITY SERVICES", "code"=>"5021203000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"81", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"GENERAL SERVICES", "title"=>"OTHER GENERAL SERVICES", "code"=>"5021299000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"82", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE", "title"=>"RM - OTHER LAND IMPROVEMENTS", "code"=>"5021302099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"83", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE- INFRASTRUCTURE ASSETS", "title"=>"RM - WATER SUPPLY SYSTEM", "code"=>"5021303004", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"84", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE- INFRASTRUCTURE ASSETS", "title"=>"RM - POWER SUPPLY SYSTEMS", "code"=>"5021303005", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"85", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE- INFRASTRUCTURE ASSETS", "title"=>"RM - COMMUNICATION NETWORKS", "code"=>"5021303006", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"86", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE- INFRASTRUCTURE ASSETS", "title"=>"RM - OTHER INFRASTRUCTURE ASSETS", "code"=>"5021303099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"87", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE- BUILDING AND OTHER STRUCTURES", "title"=>"RM - BUILDINGS", "code"=>"5021304001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"88", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE- BUILDING AND OTHER STRUCTURES", "title"=>"RM - HOSPITALS AND HEALTH CENTERS", "code"=>"5021304003", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"89", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE- BUILDING AND OTHER STRUCTURES", "title"=>"RM - OTHER STRUCTURES", "code"=>"5021304099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"90", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-MACHINERY AND EQUIPMENT", "title"=>"RM - MACHINERY ", "code"=>"5021305001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"91", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-MACHINERY AND EQUIPMENT", "title"=>"RM - OFFICE EQUIPMENT", "code"=>"5021305002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"92", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-MACHINERY AND EQUIPMENT", "title"=>"RM - ICT EQUIPMENT", "code"=>"5021305003", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"93", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-MACHINERY AND EQUIPMENT", "title"=>"RM - AIRPORT EQUIPMENT", "code"=>"5021305006", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"94", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-MACHINERY AND EQUIPMENT", "title"=>"RM - COMMUNICATION EQUIPMENT", "code"=>"5021305007", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"95", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-MACHINERY AND EQUIPMENT", "title"=>"RM - DISASTER RESPONSE AND RESCUE EQUIPMENT", "code"=>"5021305009", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"96", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-MACHINERY AND EQUIPMENT", "title"=>"RM - MEDICAL EQUIPMENT", "code"=>"5021305011", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"97", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-MACHINERY AND EQUIPMENT", "title"=>"RM - PRINTING EQUIPMENT", "code"=>"5021305012", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"98", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-MACHINERY AND EQUIPMENT", "title"=>"RM - TECHNICAL AND SCIENTIFIC EQUIPMENT", "code"=>"5021305014", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"99", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-MACHINERY AND EQUIPMENT", "title"=>"RM - OTHER MACHINERY AND EQUIPMENT", "code"=>"5021305099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"100", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-TRANSPORTATION EQUIPMENT", "title"=>"RM - MOTOR VEHICLES", "code"=>"5021306001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"101", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-TRANSPORTATION EQUIPMENT", "title"=>"RM - TRAINS", "code"=>"5021306002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"102", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-TRANSPORTATION EQUIPMENT", "title"=>"RM - WATERCRAFTS", "code"=>"5021306004", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"103", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-TRANSPORTATION EQUIPMENT", "title"=>"RM - OTHER TRANSPORTATION EQUIPMENT", "code"=>"5021306099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"104", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-TRANSPORTATION EQUIPMENT", "title"=>"RM - FURNITURE AND FIXTURES", "code"=>"5021307000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"105", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-LEASED ASSETS IMPROVEMENTS", "title"=>"RM - LEASED ASSETS IMPROVEMENTS, LAND", "code"=>"5021309001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"106", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-LEASED ASSETS IMPROVEMENTS", "title"=>"RM - LEASED ASSETS IMPROVEMENTS , BUILDINGS", "code"=>"5021309002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"107", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-LEASED ASSETS IMPROVEMENTS", "title"=>"RM - OTHER LEASED ASSETS IMPROVEMENTS", "code"=>"5021309099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"108", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"REPAIR AND MAINTENANCE-LEASED ASSETS IMPROVEMENTS", "title"=>"RM - OTHER PROPERTY, PLANT AND EQUIPMENT", "code"=>"5021399099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"109", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"FINANCIAL ASSISTANCE/ SUBSIDY", "title"=>"SUBSIDY TO NATIONAL GOVERNMENT AGENCIES", "code"=>"5021401000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"110", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"FINANCIAL ASSISTANCE/ SUBSIDY", "title"=>"FINANCIAL ASSISTANCE TO NGAS", "code"=>"5021402000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"111", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"FINANCIAL ASSISTANCE/ SUBSIDY", "title"=>"FINANCIAL ASSISTANCE LOCAL GOVERNMENT UNITS", "code"=>"5021403000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"112", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"FINANCIAL ASSISTANCE/ SUBSIDY", "title"=>"BUDGETARY SUPPORT TO GOVERNMENT-OWNED AND/OR CONTROLLED CORPORATIONS", "code"=>"5021404000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"113", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"FINANCIAL ASSISTANCE/ SUBSIDY", "title"=>"FINANCIAL ASSISTANCE TO NGOS/POS", "code"=>"5021405000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"114", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"FINANCIAL ASSISTANCE/ SUBSIDY", "title"=>"SUBSIDY- OTHERS", "code"=>"5021499000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"115", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"TAXES, INSURANCE PREMIUMS AND OTHER FEES", "title"=>"TAXES, DUTIES AND LICENSES", "code"=>"5021501001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"116", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"TAXES, INSURANCE PREMIUMS AND OTHER FEES", "title"=>"TAX REFUND", "code"=>"5021501002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"117", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"TAXES, INSURANCE PREMIUMS AND OTHER FEES", "title"=>"FIDELITY BOND PREMIUMS", "code"=>"5021502000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"118", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"TAXES, INSURANCE PREMIUMS AND OTHER FEES", "title"=>"INSURANCE EXPENSES", "code"=>"5021503000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"119", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"OTHER MAINTENANCE AND OPERATING EXPENSES", "title"=>"ADVERTISING EXPENSES", "code"=>"5029901000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"120", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"OTHER MAINTENANCE AND OPERATING EXPENSES", "title"=>"PRINTING AND PUBLICATION EXPENSES", "code"=>"5029902000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"121", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"OTHER MAINTENANCE AND OPERATING EXPENSES", "title"=>"REPRESENTATION EXPENSES", "code"=>"5029903000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"122", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"OTHER MAINTENANCE AND OPERATING EXPENSES", "title"=>"TRANSPORTATION AND DELIVERY EXPENSES", "code"=>"5029904000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"123", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"RENT/ LEASE EXPENSES", "title"=>"RENT- BUILDING AND STRUCTURES", "code"=>"5029905001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"124", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"RENT/ LEASE EXPENSES", "title"=>"RENT- LANDS", "code"=>"5029905002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"125", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"RENT/ LEASE EXPENSES", "title"=>"RENT- MOTOR VEHICLES", "code"=>"5029905003", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"126", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"RENT/ LEASE EXPENSES", "title"=>"RENT- EQUIPMENT", "code"=>"5029905004", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"127", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"RENT/ LEASE EXPENSES", "title"=>"MEMBERSHIP DUES AND CONTRIBUTIONS TO ORGANIZATIONS", "code"=>"5029906000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"128", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"RENT/ LEASE EXPENSES", "title"=>"SUBSCRIPTION EXPENSES", "code"=>"5029907000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"129", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"RENT/ LEASE EXPENSES", "title"=>"DONATIONS", "code"=>"5029908000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"130", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"OTHER MAINTENANCE AND OPERATING EXPENSES", "title"=>"WEBSITE MAINTENANCE", "code"=>"5029999001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"131", "category"=>"MAINTENANCE & OTHER OPERATING EXPENSES", "subcategory"=>"OTHER MAINTENANCE AND OPERATING EXPENSES", "title"=>"OTHER MAINTENANCE AND OPERATING EXPENSES", "code"=>"5029999099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"132", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"PROPERTY PLANT AND EQUIPMENT OUTLAY", "title"=>"LAND", "code"=>"5060401001 ", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"133", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"PROPERTY PLANT AND EQUIPMENT OUTLAY", "title"=>"OTHER LAND IMPROVEMENTS", "code"=>"5060402099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"134", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"INFRASTRUCTURE OUTLAY", "title"=>"WATER SUPPLY SYSTEMS", "code"=>"5060403004", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"135", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"INFRASTRUCTURE OUTLAY", "title"=>"POWER SUPPLY SYSTEMS", "code"=>"5060403005", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"136", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"INFRASTRUCTURE OUTLAY", "title"=>"COMMUNICATION NETWORKS", "code"=>"5060403006", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"137", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"INFRASTRUCTURE OUTLAY", "title"=>"OTHER INFRASTRUCTURE ASSETS", "code"=>"5060403099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"138", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"BUILDING AND OTHER STRUCTURES OUTLAY", "title"=>"BUILDINGS", "code"=>"5060404001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"139", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"BUILDING AND OTHER STRUCTURES OUTLAY", "title"=>"HOSPITALS AND HEALTH CENTERS", "code"=>"5060404003", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"140", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"BUILDING AND OTHER STRUCTURES OUTLAY", "title"=>"HOTELS AND DORMITORIES", "code"=>"5060404006", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"141", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"BUILDING AND OTHER STRUCTURES OUTLAY", "title"=>"OTHER STRUCTURES", "code"=>"5060404099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"142", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"MACHINERY AND EQUIPMENT OUTLAY", "title"=>"MACHINERY ", "code"=>"5060405001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"143", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"MACHINERY AND EQUIPMENT OUTLAY", "title"=>"OFFICE EQUIPMENT", "code"=>"5060405002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"144", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"MACHINERY AND EQUIPMENT OUTLAY", "title"=>"INFORMATION AND COMMUNICATION TECHNOLOGY EQUIPMENT", "code"=>"5060405003", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"145", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"MACHINERY AND EQUIPMENT OUTLAY", "title"=>"AIRPORT EQUIPMENT", "code"=>"5060405006", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"146", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"MACHINERY AND EQUIPMENT OUTLAY", "title"=>"COMMUNICATION EQUIPMENT", "code"=>"5060405007", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"147", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"MACHINERY AND EQUIPMENT OUTLAY", "title"=>"DISASTER RESPONSE AND RESCUE EQUIPMENT", "code"=>"5060405009", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"148", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"MACHINERY AND EQUIPMENT OUTLAY", "title"=>"MEDICAL EQUIPMENT", "code"=>"5060405011", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"149", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"MACHINERY AND EQUIPMENT OUTLAY", "title"=>"PRINTING EQUIPMENT", "code"=>"5060405012", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"150", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"MACHINERY AND EQUIPMENT OUTLAY", "title"=>"TECHNICAL AND SCIENTIFIC EQUIPMENT", "code"=>"5060405014", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"151", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"MACHINERY AND EQUIPMENT OUTLAY", "title"=>"OTHER MACHINERY AND EQUIPMENT", "code"=>"5060405099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"152", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"TRANSPORTATION EQUIPMENT OUTLAY", "title"=>"MOTOR VEHICLES", "code"=>"5060406001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"153", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"TRANSPORTATION EQUIPMENT OUTLAY", "title"=>"TRAINS", "code"=>"5060406002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"154", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"TRANSPORTATION EQUIPMENT OUTLAY", "title"=>"WATERCRAFTS", "code"=>"5060406004", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"155", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"TRANSPORTATION EQUIPMENT OUTLAY", "title"=>"OTHER TRANSPORTATION EQUIPMENT", "code"=>"5060406099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"156", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"FURNITURE, FIXTURES AND BOOKS OUTLAY", "title"=>"FURNITURE AND FIXTURES", "code"=>"5060407001", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"157", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"FURNITURE, FIXTURES AND BOOKS OUTLAY", "title"=>"BOOKS", "code"=>"5060407002", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"158", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"FURNITURE, FIXTURES AND BOOKS OUTLAY", "title"=>"OTHER PROPERTY, PLANT AND EQUIPMENT", "code"=>"5060409099", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"159", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"INTANGIBLE ASSETS OUTLAY", "title"=>"PATENTS/ COPYRIGHTS", "code"=>"5060601000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"160", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"INTANGIBLE ASSETS OUTLAY", "title"=>"COMPUTER SOFTWARE", "code"=>"5060602000", "status"=>"ACTIVE"]);
        RefUacs::create(["id"=>"161", "category"=>"CAPITAL OUTLAYS", "subcategory"=>"INTANGIBLE ASSETS OUTLAY", "title"=>"OTHER INTANGIBLE ASSETS", "code"=>"5060699000", "status"=>"ACTIVE"]);
    }
}
