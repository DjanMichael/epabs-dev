<?php

use Illuminate\Database\Seeder;

class RefInventoryClassification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('ref_classification')->delete();

        \DB::table('ref_classification')->insert(array (
            0 =>
            array (
                'id' => 1,
                'classification' => 'COMMON OFFICE EQUIPMENTS',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            1 =>
            array (
                'id' => 2,
                'classification' => 'JANITORIAL SUPPLIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            2 =>
            array (
                'id' => 3,
                'classification' => 'COMPUTER EQUIPMENTS AND ACCESSORIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            3 =>
            array (
                'id' => 4,
                'classification' => 'COMPUTER CONSUMABLE SUPPLIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            4 =>
            array (
                'id' => 5,
                'classification' => 'HOUSE KEEPING SUPPLIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            5 =>
            array (
                'id' => 6,
                'classification' => 'INDUSTRIAL EQUIPMENTS',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            6 =>
            array (
                'id' => 7,
                'classification' => 'VEHICLE REPAIR, MAINTENANCE AND MATERIALS',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            7 =>
            array (
                'id' => 8,
                'classification' => 'ADVOCACY MATERIALS',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            8 =>
            array (
                'id' => 9,
                'classification' => 'MEDICAL DEVICES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            9 =>
            array (
                'id' => 10,
                'classification' => 'SURGICAL INSTRUMENTS',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            10 =>
            array (
                'id' => 11,
                'classification' => 'CONTRACEPTIVE DEVICES AND SUPPLIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            11 =>
            array (
                'id' => 12,
                'classification' => 'DRUGS AND MEDICINES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            12 =>
            array (
                'id' => 13,
                'classification' => 'DENTAL SUPPLIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            13 =>
            array (
                'id' => 14,
                'classification' => 'CATERING SERVICES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            14 =>
            array (
                'id' => 15,
                'classification' => 'OUTSOURCING SERVICES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            15 =>
            array (
                'id' => 16,
                'classification' => 'CELL CARDS',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            16 =>
            array (
                'id' => 17,
                'classification' => 'FUEL, OIL AND LUBRICANTS',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            17 =>
            array (
                'id' => 18,
                'classification' => 'VAN RENTALS SERVICES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            18 =>
            array (
                'id' => 19,
                'classification' => 'ELECTRONIC BILLBOARD SUBSCRIPTION',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            19 =>
            array (
                'id' => 20,
                'classification' => 'WAREHOUSE RENTAL',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            20 =>
            array (
                'id' => 21,
                'classification' => 'PRINTER SUPPLIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            21 =>
            array (
                'id' => 22,
                'classification' => 'FURNITURE AND FIXTURE',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            22 =>
            array (
                'id' => 23,
                'classification' => 'LABORATORY AND MEDICAL SUPPLIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            23 =>
            array (
                'id' => 24,
                'classification' => 'HANDBOOK',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            24 =>
            array (
                'id' => 25,
                'classification' => 'MEDIA KIT',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            25 =>
            array (
                'id' => 26,
                'classification' => 'ADVERTISEMENT',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            26 =>
            array (
                'id' => 27,
                'classification' => 'NEWSPAPER SUBCRIPTION ',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            27 =>
            array (
                'id' => 28,
                'classification' => 'MONITORING',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            28 =>
            array (
                'id' => 29,
                'classification' => 'ACTIVITY SUPPLIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            29 =>
            array (
                'id' => 30,
                'classification' => 'COMMON OFFICE DEVICES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            30 =>
            array (
                'id' => 31,
                'classification' => 'COMMON OFFICE SUPPLIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            31 =>
            array (
                'id' => 32,
                'classification' => 'ELECTRICAL SUPPLIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            32 =>
            array (
                'id' => 33,
                'classification' => 'MANDATORY SERVICES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            33 =>
            array (
                'id' => 34,
                'classification' => 'TECHNICAL SUPPORT',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            34 =>
            array (
                'id' => 35,
                'classification' => 'TRAVELING EXPENSE',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            35 =>
            array (
                'id' => 36,
                'classification' => 'INCENTIVES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            36 =>
            array (
                'id' => 37,
                'classification' => 'REPAIR AND MAINTENANCE',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            37 =>
            array (
                'id' => 38,
                'classification' => 'POSTAGE AND DELIVERIES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            38 =>
            array (
                'id' => 39,
                'classification' => 'ACCOUNTABLE FORMS',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            39 =>
            array (
                'id' => 40,
                'classification' => 'SUBSCRIPTION',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            40 =>
            array (
                'id' => 41,
                'classification' => 'TRANSPORTATION AND DELIVERY EXPENSES',
                'status' => 'ACTIVE',
                'created_at' => '2021-03-17 16:12:50',
                'updated_at' => '2021-03-17 16:12:50',
            ),
            41 =>
            array (
                'id' => 42,
                'classification' => 'JOB ORDER',
                'status' => 'ACTIVE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
