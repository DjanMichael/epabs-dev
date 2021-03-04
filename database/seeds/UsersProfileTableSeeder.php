<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersProfileTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users_profile')->delete();
        
        \DB::table('users_profile')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'contact' => '',
                'designation' => '',
                'pic' => '',
                'unit_id' => 1,
                'created_at' => '2021-01-06 01:38:15',
                'updated_at' => '2021-01-06 01:38:15',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'contact' => '09092743533',
                'designation' => 'Planning Officer II',
                'pic' => '',
                'unit_id' => 4,
                'created_at' => '2021-01-11 11:18:47',
                'updated_at' => '2021-01-11 11:18:47',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'contact' => '09478919614',
                'designation' => 'LHSD Chief',
                'pic' => '',
                'unit_id' => 29,
                'created_at' => '2021-01-11 11:50:34',
                'updated_at' => '2021-01-11 11:50:34',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'contact' => '09610713163',
                'designation' => 'Training Specialist III',
                'pic' => '',
                'unit_id' => 18,
                'created_at' => '2021-01-11 11:50:47',
                'updated_at' => '2021-01-11 11:50:47',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'contact' => '09086164032',
                'designation' => 'Head of Governance Cluster / DMO IV FOR BUTUAN CITY',
                'pic' => '',
                'unit_id' => 8,
                'created_at' => '2021-01-11 12:02:25',
                'updated_at' => '2021-01-11 12:02:25',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 7,
                'contact' => '09089017779',
                'designation' => 'Medical Officer III',
                'pic' => '',
                'unit_id' => 12,
                'created_at' => '2021-01-11 12:40:27',
                'updated_at' => '2021-01-11 12:40:27',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 8,
                'contact' => '09177036524',
                'designation' => 'Senior Health Program Officer',
                'pic' => '',
                'unit_id' => 8,
                'created_at' => '2021-01-11 12:50:34',
                'updated_at' => '2021-01-11 12:50:34',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 9,
                'contact' => '09150247741',
                'designation' => 'AA III',
                'pic' => '',
                'unit_id' => 8,
                'created_at' => '2021-01-11 13:16:21',
                'updated_at' => '2021-01-11 13:16:21',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 10,
                'contact' => '09998822172',
                'designation' => 'NURSE V',
                'pic' => '',
                'unit_id' => 34,
                'created_at' => '2021-01-11 13:19:20',
                'updated_at' => '2021-01-11 13:19:20',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 11,
                'contact' => '09351695589',
                'designation' => 'ENGINEER III',
                'pic' => '',
                'unit_id' => 11,
                'created_at' => '2021-01-11 14:35:24',
                'updated_at' => '2021-01-11 14:35:24',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 12,
                'contact' => '09985612061',
                'designation' => 'Medical Officer IV',
                'pic' => '',
                'unit_id' => 11,
                'created_at' => '2021-01-11 14:35:39',
                'updated_at' => '2021-01-11 14:35:39',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 13,
                'contact' => '09278560722',
                'designation' => 'Nurse V',
                'pic' => '',
                'unit_id' => 11,
                'created_at' => '2021-01-11 14:43:59',
                'updated_at' => '2021-01-11 14:43:59',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 14,
                'contact' => '09171425885',
                'designation' => 'Nurse III',
                'pic' => '',
                'unit_id' => 11,
                'created_at' => '2021-01-11 14:46:23',
                'updated_at' => '2021-01-11 14:46:23',
            ),
            13 => 
            array (
                'id' => 15,
                'user_id' => 16,
                'contact' => '09338188145',
                'designation' => 'HEPO III',
                'pic' => '',
                'unit_id' => 20,
                'created_at' => '2021-01-11 15:40:29',
                'updated_at' => '2021-01-11 15:40:29',
            ),
            14 => 
            array (
                'id' => 16,
                'user_id' => 17,
                'contact' => '09195204851',
                'designation' => 'Computer Maintenance Technologist III',
                'pic' => '',
                'unit_id' => 21,
                'created_at' => '2021-01-12 08:27:42',
                'updated_at' => '2021-01-12 08:27:42',
            ),
            15 => 
            array (
                'id' => 17,
                'user_id' => 18,
                'contact' => '09103011309',
                'designation' => 'SHPO',
                'pic' => '',
                'unit_id' => 12,
                'created_at' => '2021-01-12 13:16:06',
                'updated_at' => '2021-01-12 13:16:06',
            ),
            16 => 
            array (
                'id' => 18,
                'user_id' => 19,
                'contact' => '09177734939',
                'designation' => 'HFEP Coordinator',
                'pic' => '',
                'unit_id' => 8,
                'created_at' => '2021-01-12 14:38:45',
                'updated_at' => '2021-01-12 14:38:45',
            ),
            17 => 
            array (
                'id' => 19,
                'user_id' => 20,
                'contact' => '09103011309',
                'designation' => 'Senior Health Program Officer',
                'pic' => '',
                'unit_id' => 12,
                'created_at' => '2021-01-12 15:01:42',
                'updated_at' => '2021-01-12 15:01:42',
            ),
            18 => 
            array (
                'id' => 20,
                'user_id' => 21,
                'contact' => '09215263798',
                'designation' => 'Administrative Officer V',
                'pic' => '',
                'unit_id' => 35,
                'created_at' => '2021-01-13 09:24:18',
                'updated_at' => '2021-01-13 09:24:18',
            ),
            19 => 
            array (
                'id' => 21,
                'user_id' => 22,
                'contact' => '09266530006',
                'designation' => 'AO V',
                'pic' => '',
                'unit_id' => 14,
                'created_at' => '2021-01-13 10:59:44',
                'updated_at' => '2021-01-13 10:59:44',
            ),
            20 => 
            array (
                'id' => 22,
                'user_id' => 23,
                'contact' => '09215263798',
                'designation' => 'Administrative Officer v',
                'pic' => '',
                'unit_id' => 35,
                'created_at' => '2021-01-13 15:30:23',
                'updated_at' => '2021-01-13 15:30:23',
            ),
            21 => 
            array (
                'id' => 23,
                'user_id' => 24,
                'contact' => '09287233077',
                'designation' => 'Pharmcay III',
                'pic' => '',
                'unit_id' => 8,
                'created_at' => '2021-01-13 15:34:55',
                'updated_at' => '2021-01-13 15:34:55',
            ),
            22 => 
            array (
                'id' => 24,
                'user_id' => 25,
                'contact' => '09215263798',
                'designation' => 'Administrative Officer V',
                'pic' => '',
                'unit_id' => 35,
                'created_at' => '2021-01-13 15:38:09',
                'updated_at' => '2021-01-13 15:38:09',
            ),
            23 => 
            array (
                'id' => 25,
                'user_id' => 26,
                'contact' => '09287233077',
                'designation' => 'PHARMACY III/NDCPO',
                'pic' => '',
                'unit_id' => 8,
                'created_at' => '2021-01-13 15:40:46',
                'updated_at' => '2021-01-13 15:40:46',
            ),
            24 => 
            array (
                'id' => 26,
                'user_id' => 27,
                'contact' => '09077931604',
                'designation' => 'PLANNING OFFICER III',
                'pic' => '',
                'unit_id' => 4,
                'created_at' => '2021-01-13 15:43:21',
                'updated_at' => '2021-01-13 15:43:21',
            ),
            25 => 
            array (
                'id' => 27,
                'user_id' => 28,
                'contact' => '09077931604',
                'designation' => 'PLANNING OFFICER III',
                'pic' => '',
                'unit_id' => 4,
                'created_at' => '2021-01-13 15:47:50',
                'updated_at' => '2021-01-13 15:47:50',
            ),
            26 => 
            array (
                'id' => 28,
                'user_id' => 29,
                'contact' => '09985415440',
                'designation' => 'Nurse III',
                'pic' => '',
                'unit_id' => 10,
                'created_at' => '2021-01-13 15:52:54',
                'updated_at' => '2021-01-13 15:52:54',
            ),
            27 => 
            array (
                'id' => 29,
                'user_id' => 30,
                'contact' => '09778522777',
                'designation' => 'Nurse III',
                'pic' => '',
                'unit_id' => 32,
                'created_at' => '2021-01-13 15:53:38',
                'updated_at' => '2021-01-13 15:53:38',
            ),
            28 => 
            array (
                'id' => 30,
                'user_id' => 31,
                'contact' => '09196720351',
                'designation' => 'Nurse V',
                'pic' => '',
                'unit_id' => 10,
                'created_at' => '2021-01-13 15:59:27',
                'updated_at' => '2021-01-13 15:59:27',
            ),
            29 => 
            array (
                'id' => 31,
                'user_id' => 32,
                'contact' => '09306114714',
                'designation' => 'Medical Officer IV',
                'pic' => '',
                'unit_id' => 10,
                'created_at' => '2021-01-13 16:05:59',
                'updated_at' => '2021-01-13 16:05:59',
            ),
            30 => 
            array (
                'id' => 32,
                'user_id' => 33,
                'contact' => '09489877325',
                'designation' => 'Dent III',
                'pic' => '',
                'unit_id' => 10,
                'created_at' => '2021-01-13 16:07:09',
                'updated_at' => '2021-01-13 16:07:09',
            ),
            31 => 
            array (
                'id' => 33,
                'user_id' => 34,
                'contact' => '09494816930',
                'designation' => 'Nutritionist-Dietician IV',
                'pic' => '',
                'unit_id' => 10,
                'created_at' => '2021-01-13 16:08:38',
                'updated_at' => '2021-01-13 16:08:38',
            ),
            32 => 
            array (
                'id' => 34,
                'user_id' => 35,
                'contact' => '09778522777',
                'designation' => 'Nurse III',
                'pic' => '',
                'unit_id' => 10,
                'created_at' => '2021-01-13 16:10:14',
                'updated_at' => '2021-01-13 16:10:14',
            ),
            33 => 
            array (
                'id' => 35,
                'user_id' => 36,
                'contact' => '09203923044',
                'designation' => 'Nurse V',
                'pic' => '',
                'unit_id' => 10,
                'created_at' => '2021-01-13 16:13:52',
                'updated_at' => '2021-01-13 16:13:52',
            ),
            34 => 
            array (
                'id' => 36,
                'user_id' => 37,
                'contact' => '09177708447',
                'designation' => 'BUDGET OFFICER',
                'pic' => '',
                'unit_id' => 15,
                'created_at' => '2021-01-14 13:55:06',
                'updated_at' => '2021-01-14 13:55:06',
            ),
            35 => 
            array (
                'id' => 37,
                'user_id' => 38,
                'contact' => '09998710552',
                'designation' => 'Medical Technologist IV',
                'pic' => '',
                'unit_id' => 12,
                'created_at' => '2021-01-14 14:25:47',
                'updated_at' => '2021-01-14 14:25:47',
            ),
            36 => 
            array (
                'id' => 38,
                'user_id' => 39,
                'contact' => '09399315471',
                'designation' => 'DMO V',
                'pic' => '',
                'unit_id' => 40,
                'created_at' => '2021-01-14 14:38:38',
                'updated_at' => '2021-01-14 14:38:38',
            ),
            37 => 
            array (
                'id' => 39,
                'user_id' => 40,
                'contact' => '09177708447',
                'designation' => 'Dry Run',
                'pic' => '',
                'unit_id' => 4,
                'created_at' => '2021-01-15 13:38:38',
                'updated_at' => '2021-01-15 13:38:38',
            ),
            38 => 
            array (
                'id' => 40,
                'user_id' => 41,
                'contact' => '09177708447',
                'designation' => 'end user',
                'pic' => '',
                'unit_id' => 21,
                'created_at' => '2021-01-19 14:57:51',
                'updated_at' => '2021-01-19 14:57:51',
            ),
            39 => 
            array (
                'id' => 41,
                'user_id' => 42,
                'contact' => '09095994753',
                'designation' => 'Entomologist III',
                'pic' => '',
                'unit_id' => 12,
                'created_at' => '2021-01-20 09:24:07',
                'updated_at' => '2021-01-20 09:24:07',
            ),
            40 => 
            array (
                'id' => 42,
                'user_id' => 43,
                'contact' => '09177708447',
                'designation' => 'PLANNING OFFICER III',
                'pic' => '',
                'unit_id' => 4,
                'created_at' => '2021-02-03 09:47:02',
                'updated_at' => '2021-02-03 09:47:02',
            ),
            41 => 
            array (
                'id' => 43,
                'user_id' => 44,
                'contact' => '09985612061',
                'designation' => 'NCD Cluster Head',
                'pic' => '',
                'unit_id' => 11,
                'created_at' => '2021-02-09 10:46:00',
                'updated_at' => '2021-02-09 10:46:00',
            ),
            42 => 
            array (
                'id' => 44,
                'user_id' => 45,
                'contact' => '09103718118',
                'designation' => 'user',
                'pic' => '',
                'unit_id' => 8,
                'created_at' => '2021-02-09 10:46:56',
                'updated_at' => '2021-02-09 10:46:56',
            ),
            43 => 
            array (
                'id' => 45,
                'user_id' => 46,
                'contact' => '09185461974',
                'designation' => 'Medtech II',
                'pic' => '',
                'unit_id' => 12,
                'created_at' => '2021-02-09 11:09:06',
                'updated_at' => '2021-02-09 11:09:06',
            ),
            44 => 
            array (
                'id' => 46,
                'user_id' => 47,
                'contact' => '09205078504',
                'designation' => 'TB HIV Nurse Coordinator',
                'pic' => '',
                'unit_id' => 12,
                'created_at' => '2021-02-09 11:12:53',
                'updated_at' => '2021-02-09 11:12:53',
            ),
            45 => 
            array (
                'id' => 47,
                'user_id' => 48,
                'contact' => '09183189242',
                'designation' => 'Licensing Officer III',
                'pic' => '',
                'unit_id' => 22,
                'created_at' => '2021-02-09 11:46:22',
                'updated_at' => '2021-02-09 11:46:22',
            ),
            46 => 
            array (
                'id' => 48,
                'user_id' => 49,
                'contact' => '09984937388',
                'designation' => 'Regional Malaria coordinator',
                'pic' => '',
                'unit_id' => 12,
                'created_at' => '2021-02-09 13:08:32',
                'updated_at' => '2021-02-09 13:08:32',
            ),
            47 => 
            array (
                'id' => 49,
                'user_id' => 50,
                'contact' => '09276909419',
                'designation' => 'Test',
                'pic' => '',
                'unit_id' => 4,
                'created_at' => '2021-02-09 14:46:39',
                'updated_at' => '2021-02-09 14:46:39',
            ),
            48 => 
            array (
                'id' => 50,
                'user_id' => 51,
                'contact' => '09274977265',
                'designation' => 'Planning Officer',
                'pic' => '',
                'unit_id' => 4,
                'created_at' => '2021-02-09 14:49:46',
                'updated_at' => '2021-02-09 14:49:46',
            ),
            49 => 
            array (
                'id' => 51,
                'user_id' => 52,
                'contact' => '09092743533',
                'designation' => 'Technical Assistant !',
                'pic' => '',
                'unit_id' => 4,
                'created_at' => '2021-02-09 14:50:03',
                'updated_at' => '2021-02-09 14:50:03',
            ),
            50 => 
            array (
                'id' => 52,
                'user_id' => 53,
                'contact' => '09274977265',
                'designation' => 'Planning Officer 1',
                'pic' => '',
                'unit_id' => 4,
                'created_at' => '2021-02-09 15:12:38',
                'updated_at' => '2021-02-09 15:12:38',
            ),
            51 => 
            array (
                'id' => 53,
                'user_id' => 54,
                'contact' => '09982648084',
                'designation' => 'ARD',
                'pic' => '',
                'unit_id' => 3,
                'created_at' => '2021-02-10 09:16:49',
                'updated_at' => '2021-02-10 09:16:49',
            ),
            52 => 
            array (
                'id' => 54,
                'user_id' => 55,
                'contact' => '09086164032',
                'designation' => 'DMO IV of Butuan City',
                'pic' => '',
                'unit_id' => 8,
                'created_at' => '2021-02-10 10:01:43',
                'updated_at' => '2021-02-10 10:01:43',
            ),
            53 => 
            array (
                'id' => 55,
                'user_id' => 56,
                'contact' => '09095994753',
                'designation' => 'Entomologist III',
                'pic' => '',
                'unit_id' => 12,
                'created_at' => '2021-02-10 10:41:30',
                'updated_at' => '2021-02-10 10:41:30',
            ),
            54 => 
            array (
                'id' => 56,
                'user_id' => 57,
                'contact' => '09187157231',
                'designation' => 'SHPO',
                'pic' => '',
                'unit_id' => 11,
                'created_at' => '2021-02-10 11:32:42',
                'updated_at' => '2021-02-10 11:32:42',
            ),
            55 => 
            array (
                'id' => 57,
                'user_id' => 59,
                'contact' => '09177960661',
                'designation' => 'Budget Officer III',
                'pic' => '',
                'unit_id' => 36,
                'created_at' => '2021-02-10 12:46:17',
                'updated_at' => '2021-02-10 12:46:17',
            ),
            56 => 
            array (
                'id' => 58,
                'user_id' => 60,
                'contact' => '09338188145',
                'designation' => 'HEPO III',
                'pic' => '',
                'unit_id' => 20,
                'created_at' => '2021-02-11 09:20:15',
                'updated_at' => '2021-02-11 09:20:15',
            ),
            57 => 
            array (
                'id' => 59,
                'user_id' => 61,
                'contact' => '09108875231',
                'designation' => 'Administraive Officer V',
                'pic' => '',
                'unit_id' => 16,
                'created_at' => '2021-02-11 13:05:16',
                'updated_at' => '2021-02-11 13:05:16',
            ),
            58 => 
            array (
                'id' => 60,
                'user_id' => 62,
                'contact' => '09278768573',
                'designation' => 'AA III',
                'pic' => '',
                'unit_id' => 3,
                'created_at' => '2021-02-11 13:19:03',
                'updated_at' => '2021-02-11 13:19:03',
            ),
            59 => 
            array (
                'id' => 61,
                'user_id' => 63,
                'contact' => '09190017880',
                'designation' => 'Accountant III',
                'pic' => '',
                'unit_id' => 15,
                'created_at' => '2021-02-11 13:19:22',
                'updated_at' => '2021-02-11 13:19:22',
            ),
            60 => 
            array (
                'id' => 62,
                'user_id' => 64,
                'contact' => '09173924421',
                'designation' => 'TS III',
                'pic' => '',
                'unit_id' => 3,
                'created_at' => '2021-02-11 13:23:32',
                'updated_at' => '2021-02-11 13:23:32',
            ),
            61 => 
            array (
                'id' => 63,
                'user_id' => 65,
                'contact' => '09074261791',
                'designation' => 'IT',
                'pic' => '',
                'unit_id' => 7,
                'created_at' => '2021-02-11 13:23:55',
                'updated_at' => '2021-02-11 13:23:55',
            ),
            62 => 
            array (
                'id' => 64,
                'user_id' => 66,
                'contact' => '09109803747',
                'designation' => 'AA V',
                'pic' => '',
                'unit_id' => 2,
                'created_at' => '2021-02-11 13:25:14',
                'updated_at' => '2021-02-11 13:25:14',
            ),
            63 => 
            array (
                'id' => 65,
                'user_id' => 67,
                'contact' => '09304858392',
                'designation' => 'CP I',
                'pic' => '',
                'unit_id' => 21,
                'created_at' => '2021-02-11 13:28:38',
                'updated_at' => '2021-02-11 13:28:38',
            ),
            64 => 
            array (
                'id' => 66,
                'user_id' => 68,
                'contact' => '09101511082',
                'designation' => 'CP1',
                'pic' => '',
                'unit_id' => 21,
                'created_at' => '2021-02-11 13:29:21',
                'updated_at' => '2021-02-11 13:29:21',
            ),
            65 => 
            array (
                'id' => 67,
                'user_id' => 69,
                'contact' => '09488322708',
                'designation' => 'Information Systems Analyst 1',
                'pic' => '',
                'unit_id' => 21,
                'created_at' => '2021-02-11 13:30:33',
                'updated_at' => '2021-02-11 13:30:33',
            ),
            66 => 
            array (
                'id' => 68,
                'user_id' => 70,
                'contact' => '09298228459',
                'designation' => 'Administrative Officer V',
                'pic' => '',
                'unit_id' => 42,
                'created_at' => '2021-02-11 13:37:17',
                'updated_at' => '2021-02-11 13:37:17',
            ),
            67 => 
            array (
                'id' => 69,
                'user_id' => 71,
                'contact' => '09298228459',
                'designation' => 'Administrative Officer V',
                'pic' => '',
                'unit_id' => 42,
                'created_at' => '2021-02-11 13:39:10',
                'updated_at' => '2021-02-11 13:39:10',
            ),
            68 => 
            array (
                'id' => 70,
                'user_id' => 72,
                'contact' => '09153037590',
                'designation' => 'DMO V',
                'pic' => '',
                'unit_id' => 40,
                'created_at' => '2021-02-11 14:31:29',
                'updated_at' => '2021-02-11 14:31:29',
            ),
            69 => 
            array (
                'id' => 71,
                'user_id' => 73,
                'contact' => '09102691773',
                'designation' => 'DMO V',
                'pic' => '',
                'unit_id' => 37,
                'created_at' => '2021-02-11 14:43:31',
                'updated_at' => '2021-02-11 14:43:31',
            ),
            70 => 
            array (
                'id' => 72,
                'user_id' => 74,
                'contact' => '09176346406',
                'designation' => 'DMO V',
                'pic' => '',
                'unit_id' => 38,
                'created_at' => '2021-02-11 14:45:21',
                'updated_at' => '2021-02-11 14:45:21',
            ),
            71 => 
            array (
                'id' => 73,
                'user_id' => 75,
                'contact' => '09091234567',
                'designation' => 'demo',
                'pic' => '',
                'unit_id' => 36,
                'created_at' => '2021-03-01 17:52:38',
                'updated_at' => '2021-03-01 17:52:38',
            ),
        ));
        
        
    }
}