<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PreBuildProcurementMedicinesTblProcurementMedicineTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tbl_procurement_medicine')->delete();
        
        \DB::table('tbl_procurement_medicine')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => 'Amoxicillin 500mg capsule',
                'unit_id' => 14,
                'classification_id' => 12,
                'category_id' => 1,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '500mg capsule, 100s box',
                'created_at' => '2021-01-19 16:50:59',
                'updated_at' => '2021-01-26 13:42:24',
            ),
            1 => 
            array (
                'id' => 2,
                'description' => 'Amoxicillin 100mg/ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 1,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '100mg/ml, 15 ml drops',
                'created_at' => '2021-01-19 16:54:55',
                'updated_at' => '2021-01-26 13:43:19',
            ),
            2 => 
            array (
                'id' => 3,
                'description' => 'Cefalexin 250mg/5ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 1,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '250mg/5ml, 60 ml suspension',
                'created_at' => '2021-01-25 14:31:08',
                'updated_at' => '2021-01-26 13:43:41',
            ),
            3 => 
            array (
                'id' => 4,
                'description' => 'Amoxicillin 250mg/5ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 1,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '250mg/5ml, 60 ml Suspension',
                'created_at' => '2021-01-25 15:10:34',
                'updated_at' => '2021-01-26 13:47:03',
            ),
            4 => 
            array (
                'id' => 5,
                'description' => 'Cefalexin 500 mg capsule',
                'unit_id' => 14,
                'classification_id' => 12,
                'category_id' => 1,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '500 mg capsule, 100s box',
                'created_at' => '2021-01-25 15:23:33',
                'updated_at' => '2021-01-26 13:49:55',
            ),
            5 => 
            array (
                'id' => 6,
                'description' => 'Ciprofloxacin 500 mg tablet',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 1,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '500 mg tablet , 100s box',
                'created_at' => '2021-01-25 15:25:30',
                'updated_at' => '2021-01-26 13:50:51',
            ),
            6 => 
            array (
                'id' => 7,
                'description' => 'Cloxacillin 500 mg capsule',
                'unit_id' => 14,
                'classification_id' => 12,
                'category_id' => 1,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '500 mg capsule, 100s box',
                'created_at' => '2021-01-25 16:12:15',
                'updated_at' => '2021-01-26 13:51:40',
            ),
            7 => 
            array (
                'id' => 8,
            'description' => 'Co-Amoxiclav 625 (500mg amoxicillin + 125 potassium clavulanate )',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 1,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
            'strength' => '625 (500mg amoxicillin + 125 potassium clavulanate )',
                'created_at' => '2021-01-25 20:23:24',
                'updated_at' => '2021-01-26 13:53:30',
            ),
            8 => 
            array (
                'id' => 9,
            'description' => 'Co-Amoxiclav 228.5 (200mg amoxicillin +28.5 potassium clavulanate ) per 5 ml powder for suspension',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 1,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
            'strength' => '228.5 (200mg amoxicillin +28.5 potassium clavulanate ) per 5 ml powder for suspension',
                'created_at' => '2021-01-25 22:23:40',
                'updated_at' => '2021-01-26 13:55:09',
            ),
            9 => 
            array (
                'id' => 10,
                'description' => 'Chlorphenamine 4mg Tablet',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 2,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '4mg Tablet, 100\'s box',
                'created_at' => '2021-01-25 22:29:17',
                'updated_at' => '2021-01-26 13:56:09',
            ),
            10 => 
            array (
                'id' => 11,
                'description' => 'Cetirizine 1mg/ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 2,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '1mg/ml, 30 ml syrup',
                'created_at' => '2021-01-26 13:57:28',
                'updated_at' => '2021-01-26 13:57:28',
            ),
            11 => 
            array (
                'id' => 12,
                'description' => 'Cetirizine 10 mg tablet',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 2,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '10 mg tablet, 100s box',
                'created_at' => '2021-01-26 13:59:55',
                'updated_at' => '2021-01-26 13:59:55',
            ),
            12 => 
            array (
                'id' => 13,
                'description' => 'Lagundi 600 mg tablet',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 3,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '600 mg tablet 100s box',
                'created_at' => '2021-01-26 14:00:41',
                'updated_at' => '2021-01-26 14:00:41',
            ),
            13 => 
            array (
                'id' => 14,
                'description' => 'Lagundi 300mg/5 ml',
                'unit_id' => 37,
                'classification_id' => 12,
                'category_id' => 3,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '300mg/5 ml, 120 ml Syrup',
                'created_at' => '2021-01-26 14:01:52',
                'updated_at' => '2021-01-26 14:01:52',
            ),
            14 => 
            array (
                'id' => 15,
            'description' => 'Salbutamol (As sulfate) 2mg/5 ml syrup',
                'unit_id' => 37,
                'classification_id' => 12,
                'category_id' => 3,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '2mg/5 ml syrup, 60ml',
                'created_at' => '2021-01-26 14:02:30',
                'updated_at' => '2021-01-26 14:02:30',
            ),
            15 => 
            array (
                'id' => 16,
            'description' => 'Salbutamol 1mg/ml, 2.5 ml (unit dose)nebule',
                'unit_id' => 41,
                'classification_id' => 12,
                'category_id' => 3,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
            'strength' => '1mg/ml, 2.5 ml (unit dose)nebule, 30s box',
                'created_at' => '2021-01-26 14:04:01',
                'updated_at' => '2021-01-26 14:04:01',
            ),
            16 => 
            array (
                'id' => 17,
            'description' => 'Ascorbic Acid (Vitamin C) 100mg/ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 4,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '100mg/ml, 15ml Drops',
                'created_at' => '2021-01-26 14:09:30',
                'updated_at' => '2021-01-26 14:09:30',
            ),
            17 => 
            array (
                'id' => 18,
            'description' => 'Ascorbic Acid (Vitamin C) 100mg/5 ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 4,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '100mg/5 ml, 60ml Syrup',
                'created_at' => '2021-01-26 14:10:07',
                'updated_at' => '2021-01-26 14:10:07',
            ),
            18 => 
            array (
                'id' => 19,
            'description' => 'Ascorbic Acid (Vitamin C) 500 mg Tablet',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 4,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '500 mg Tablet, 100\'s',
                'created_at' => '2021-01-26 14:10:44',
                'updated_at' => '2021-01-26 14:10:44',
            ),
            19 => 
            array (
                'id' => 20,
                'description' => 'Ferrous Fumarate 60 mg elemental iron Tablet',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 4,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '60 mg elemental iron Tablet, 100\'s',
                'created_at' => '2021-01-26 14:14:21',
                'updated_at' => '2021-01-26 14:14:21',
            ),
            20 => 
            array (
                'id' => 21,
            'description' => 'Ferrous Salt (Equiv. 15 mg Elem. Iron/0.6ml), 15 ml drops',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 4,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '15 ml drops',
                'created_at' => '2021-01-26 14:15:06',
                'updated_at' => '2021-01-26 14:15:06',
            ),
            21 => 
            array (
                'id' => 22,
            'description' => 'Ferrous Salt (Equiv. 30mg Elem. Iron/5ml)',
                'unit_id' => 37,
                'classification_id' => 12,
                'category_id' => 4,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '60 ml syrup',
                'created_at' => '2021-01-26 14:16:27',
                'updated_at' => '2021-01-26 14:16:27',
            ),
            22 => 
            array (
                'id' => 23,
                'description' => 'Multivitamins with Iron',
                'unit_id' => 14,
                'classification_id' => 12,
                'category_id' => 4,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => 'adult Capsule',
                'created_at' => '2021-01-26 14:18:12',
                'updated_at' => '2021-01-26 14:18:12',
            ),
            23 => 
            array (
                'id' => 24,
                'description' => 'Multivitamins Per 1 ml, 15 ml drops',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 4,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => 'Per 1 ml, 15 ml drops',
                'created_at' => '2021-01-26 14:18:41',
                'updated_at' => '2021-01-26 14:18:41',
            ),
            24 => 
            array (
                'id' => 25,
                'description' => 'Multivitamins per 5 ml, 60 ml syrup',
                'unit_id' => 37,
                'classification_id' => 12,
                'category_id' => 4,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => 'per 5 ml, 60 ml syrup',
                'created_at' => '2021-01-26 14:19:14',
                'updated_at' => '2021-01-26 14:19:14',
            ),
            25 => 
            array (
                'id' => 26,
                'description' => 'Vitamin B1B6B12',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 4,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '100mg+5mg+50mcg, 100s box',
                'created_at' => '2021-01-26 14:19:51',
                'updated_at' => '2021-01-26 14:19:51',
            ),
            26 => 
            array (
                'id' => 27,
                'description' => 'Ibuprofen 200 mg tablet',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 5,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '200 mg tablet, 100s box',
                'created_at' => '2021-01-26 14:22:26',
                'updated_at' => '2021-01-26 14:22:26',
            ),
            27 => 
            array (
                'id' => 28,
                'description' => 'Mefenamic Acid 500 Capsule',
                'unit_id' => 14,
                'classification_id' => 12,
                'category_id' => 5,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '500 Capsule, 100s box',
                'created_at' => '2021-01-26 14:23:11',
                'updated_at' => '2021-01-26 14:23:11',
            ),
            28 => 
            array (
                'id' => 29,
                'description' => 'Mefenamic Acid 250 Capsule',
                'unit_id' => 14,
                'classification_id' => 12,
                'category_id' => 5,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '250 Capsule, 100s box',
                'created_at' => '2021-01-26 14:24:02',
                'updated_at' => '2021-01-26 14:24:02',
            ),
            29 => 
            array (
                'id' => 30,
                'description' => 'Paracetamol 100mg/ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 5,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '100mg/ml, 15 ml drops',
                'created_at' => '2021-01-26 14:24:44',
                'updated_at' => '2021-01-26 14:24:44',
            ),
            30 => 
            array (
                'id' => 31,
                'description' => 'Paracetamol 250mg /5 ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 5,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '250mg /5 ml, 60ml syrup',
                'created_at' => '2021-01-26 14:25:19',
                'updated_at' => '2021-01-26 14:25:19',
            ),
            31 => 
            array (
                'id' => 32,
                'description' => 'Paracetamol, 500mg tablets',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 5,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '500mg tablets, 100s box',
                'created_at' => '2021-01-26 14:25:47',
                'updated_at' => '2021-01-26 14:25:47',
            ),
            32 => 
            array (
                'id' => 33,
                'description' => 'Aluminum Hyroxide + Magnesium Hydroxide 225 mg +200 mg per 5 ml suspension, 60 ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 6,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '225 mg +200 mg per 5 ml suspension, 60 ml',
                'created_at' => '2021-01-26 14:26:42',
                'updated_at' => '2021-01-26 14:26:42',
            ),
            33 => 
            array (
                'id' => 34,
                'description' => 'Aluminum Hydroxide + Magnesium Hydroxide',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 6,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '200 mg + 100 mg Tablet',
                'created_at' => '2021-01-26 14:27:38',
                'updated_at' => '2021-01-26 14:27:38',
            ),
            34 => 
            array (
                'id' => 35,
                'description' => 'Omeprazole 20 mg capsule',
                'unit_id' => 14,
                'classification_id' => 12,
                'category_id' => 6,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '20 mg capsule, 100s box',
                'created_at' => '2021-01-26 14:28:15',
                'updated_at' => '2021-01-26 14:28:15',
            ),
            35 => 
            array (
                'id' => 36,
                'description' => 'Dicycloverine 10mg/5ml syrup 60 ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 6,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '10mg/5ml syrup 60 ml',
                'created_at' => '2021-01-26 14:28:49',
                'updated_at' => '2021-01-26 14:28:49',
            ),
            36 => 
            array (
                'id' => 37,
                'description' => 'Dicycloverine 10mg tablet',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 6,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '10mg tablet, 100\'s per box',
                'created_at' => '2021-01-26 14:29:24',
                'updated_at' => '2021-01-26 14:29:24',
            ),
            37 => 
            array (
                'id' => 38,
                'description' => 'Metoclopramide 50 mg capsule',
                'unit_id' => 14,
                'classification_id' => 12,
                'category_id' => 6,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '50 mg capsule',
                'created_at' => '2021-01-26 14:30:07',
                'updated_at' => '2021-01-26 14:30:07',
            ),
            38 => 
            array (
                'id' => 39,
                'description' => 'Metoclopramide 5 mg/5ml, 60 ml',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 6,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '5 mg/5ml, 60 ml',
                'created_at' => '2021-01-26 14:31:12',
                'updated_at' => '2021-01-26 14:31:12',
            ),
            39 => 
            array (
                'id' => 40,
                'description' => 'Ranitidine 300 mg tablets',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 6,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '300 mg tablets, 100s box',
                'created_at' => '2021-01-26 14:31:51',
                'updated_at' => '2021-01-26 14:31:51',
            ),
            40 => 
            array (
                'id' => 41,
                'description' => 'Tranexamic Acid',
                'unit_id' => 14,
                'classification_id' => 12,
                'category_id' => 7,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '500 mg capsule, 100s box',
                'created_at' => '2021-01-26 14:32:21',
                'updated_at' => '2021-01-26 14:32:21',
            ),
            41 => 
            array (
                'id' => 42,
                'description' => 'Amlodipine 10mg tab',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 8,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '10mg tab, 100\'s',
                'created_at' => '2021-01-26 14:33:06',
                'updated_at' => '2021-01-26 14:33:06',
            ),
            42 => 
            array (
                'id' => 43,
                'description' => 'Amlodipine 5mg tab',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 8,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '5mg tab, 30\'s',
                'created_at' => '2021-01-26 14:33:46',
                'updated_at' => '2021-01-26 14:33:46',
            ),
            43 => 
            array (
                'id' => 44,
                'description' => 'Losartan 100 mg tabs',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 8,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '100 mg tabs, 100s',
                'created_at' => '2021-01-26 14:34:19',
                'updated_at' => '2021-01-26 14:34:19',
            ),
            44 => 
            array (
                'id' => 45,
                'description' => 'Losartan  50 mg tabs',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 8,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '50 mg tabs, 100s',
                'created_at' => '2021-01-26 14:34:46',
                'updated_at' => '2021-01-26 14:34:46',
            ),
            45 => 
            array (
                'id' => 46,
            'description' => 'Metoprolol (as tartrate)100 mg tab',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 8,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '100 mg tab, 100s',
                'created_at' => '2021-01-26 14:35:14',
                'updated_at' => '2021-01-26 14:35:14',
            ),
            46 => 
            array (
                'id' => 47,
            'description' => 'Metoprolol (as tartrate) 50 mg tab',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 8,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '50 mg tab, 100s',
                'created_at' => '2021-01-26 14:35:40',
                'updated_at' => '2021-01-26 14:35:40',
            ),
            47 => 
            array (
                'id' => 48,
                'description' => 'Metformin Hydrochloride',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 9,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '500 mg film coated tab, 100s',
                'created_at' => '2021-01-26 14:36:09',
                'updated_at' => '2021-01-26 14:36:09',
            ),
            48 => 
            array (
                'id' => 49,
                'description' => 'I.V. Fluids, 5% Dextrose in Lactated Ringer\'s 1 L Bottle',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 10,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '5% Dextrose in Lactated Ringer\'s 1 L Bottle',
                'created_at' => '2021-01-26 14:37:09',
                'updated_at' => '2021-01-26 14:37:09',
            ),
            49 => 
            array (
                'id' => 50,
                'description' => 'I.V. Fluids, 0.9% Sodium Chloride',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 10,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '0.9% Sodium Chloride 1 L Bottle',
                'created_at' => '2021-01-26 14:37:46',
                'updated_at' => '2021-01-26 14:37:46',
            ),
            50 => 
            array (
                'id' => 51,
                'description' => 'I.V. Fluids, Lactated Ringer\'s Solution',
                'unit_id' => 10,
                'classification_id' => 12,
                'category_id' => 10,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => 'Lactated Ringer\'s Solution 1 L Bottle',
                'created_at' => '2021-01-26 14:38:21',
                'updated_at' => '2021-01-26 14:38:21',
            ),
            51 => 
            array (
                'id' => 52,
            'description' => 'Tetanus Toxoid (Human)',
                'unit_id' => 5,
                'classification_id' => 12,
                'category_id' => 11,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '250IU/ml 1 ml, Ampule',
                'created_at' => '2021-01-26 14:38:54',
                'updated_at' => '2021-01-26 14:38:54',
            ),
            52 => 
            array (
                'id' => 53,
                'description' => 'Sulphur Oinment',
                'unit_id' => 2,
                'classification_id' => 12,
                'category_id' => 11,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
                'strength' => '30 g oinmenT',
                'created_at' => '2021-01-26 14:39:39',
                'updated_at' => '2021-01-26 14:39:39',
            ),
            53 => 
            array (
                'id' => 54,
            'description' => 'Troclosene Sodium (Aquatabs)',
                'unit_id' => 38,
                'classification_id' => 12,
                'category_id' => 11,
                'fix_price' => 'N',
                'status' => 'ACTIVE',
            'strength' => '67 mg Effervescent Water Purification Tablet in Paper Foil Laminate Strip of 10\'s (Box of 100\'s)**',
                'created_at' => '2021-01-26 14:40:27',
                'updated_at' => '2021-01-26 14:40:27',
            ),
        ));
        
        
    }
}