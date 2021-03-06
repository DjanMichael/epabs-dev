<?php

use Illuminate\Database\Seeder;

class RefPrice extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('ref_price')->delete();

        \DB::table('ref_price')->insert(array (
            0 =>
            array (
                'id' => 1,
                'procurement_item_id' => 1,
                'procurement_type' => 'SUPPLIES',
                'price' => '485.21',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 12:11:48',
                'updated_at' => '2021-01-13 12:11:48',
            ),
            1 =>
            array (
                'id' => 2,
                'procurement_item_id' => 2,
                'procurement_type' => 'SUPPLIES',
                'price' => '847.82',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-01-13 12:13:18',
                'updated_at' => '2021-02-03 15:29:50',
            ),
            2 =>
            array (
                'id' => 3,
                'procurement_item_id' => 3,
                'procurement_type' => 'SUPPLIES',
                'price' => '99.22',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 12:15:17',
                'updated_at' => '2021-01-13 12:15:17',
            ),
            3 =>
            array (
                'id' => 4,
                'procurement_item_id' => 4,
                'procurement_type' => 'SUPPLIES',
                'price' => '880.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 12:16:29',
                'updated_at' => '2021-01-13 12:16:29',
            ),
            4 =>
            array (
                'id' => 5,
                'procurement_item_id' => 5,
                'procurement_type' => 'SUPPLIES',
                'price' => '1214.49',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 12:17:14',
                'updated_at' => '2021-01-13 12:17:14',
            ),
            5 =>
            array (
                'id' => 6,
                'procurement_item_id' => 6,
                'procurement_type' => 'SUPPLIES',
                'price' => '21.18',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 12:17:53',
                'updated_at' => '2021-01-13 12:17:53',
            ),
            6 =>
            array (
                'id' => 7,
                'procurement_item_id' => 7,
                'procurement_type' => 'SUPPLIES',
                'price' => '880.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 12:18:49',
                'updated_at' => '2021-01-13 12:18:49',
            ),
            7 =>
            array (
                'id' => 8,
                'procurement_item_id' => 8,
                'procurement_type' => 'SUPPLIES',
                'price' => '330.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 12:19:17',
                'updated_at' => '2021-01-13 12:19:17',
            ),
            8 =>
            array (
                'id' => 9,
                'procurement_item_id' => 9,
                'procurement_type' => 'SUPPLIES',
                'price' => '88.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 12:20:08',
                'updated_at' => '2021-01-13 12:20:08',
            ),
            9 =>
            array (
                'id' => 10,
                'procurement_item_id' => 10,
                'procurement_type' => 'SUPPLIES',
                'price' => '93.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 12:20:47',
                'updated_at' => '2021-01-13 12:20:47',
            ),
            10 =>
            array (
                'id' => 11,
                'procurement_item_id' => 11,
                'procurement_type' => 'SUPPLIES',
                'price' => '39.33',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 15:57:10',
                'updated_at' => '2021-01-13 15:57:10',
            ),
            11 =>
            array (
                'id' => 12,
                'procurement_item_id' => 12,
                'procurement_type' => 'SUPPLIES',
                'price' => '81.53',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 15:58:45',
                'updated_at' => '2021-02-03 15:31:22',
            ),
            12 =>
            array (
                'id' => 13,
                'procurement_item_id' => 13,
                'procurement_type' => 'SUPPLIES',
                'price' => '88.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-13 15:59:43',
                'updated_at' => '2021-01-13 15:59:43',
            ),
            13 =>
            array (
                'id' => 14,
                'procurement_item_id' => 14,
                'procurement_type' => 'SUPPLIES',
                'price' => '36.30',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-01-14 08:13:04',
                'updated_at' => '2021-02-03 15:48:25',
            ),
            14 =>
            array (
                'id' => 15,
                'procurement_item_id' => 15,
                'procurement_type' => 'SUPPLIES',
                'price' => '19.73',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-01-14 08:17:13',
                'updated_at' => '2021-02-03 15:48:47',
            ),
            15 =>
            array (
                'id' => 16,
                'procurement_item_id' => 16,
                'procurement_type' => 'SUPPLIES',
                'price' => '165.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:18:20',
                'updated_at' => '2021-01-14 08:18:20',
            ),
            16 =>
            array (
                'id' => 17,
                'procurement_item_id' => 17,
                'procurement_type' => 'SUPPLIES',
                'price' => '47.19',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:20:21',
                'updated_at' => '2021-01-14 08:20:21',
            ),
            17 =>
            array (
                'id' => 18,
                'procurement_item_id' => 18,
                'procurement_type' => 'SUPPLIES',
                'price' => '907.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:21:03',
                'updated_at' => '2021-01-14 08:21:03',
            ),
            18 =>
            array (
                'id' => 19,
                'procurement_item_id' => 19,
                'procurement_type' => 'SUPPLIES',
                'price' => '88.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:22:16',
                'updated_at' => '2021-01-14 08:22:16',
            ),
            19 =>
            array (
                'id' => 20,
                'procurement_item_id' => 20,
                'procurement_type' => 'SUPPLIES',
                'price' => '550.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:23:17',
                'updated_at' => '2021-01-14 08:23:17',
            ),
            20 =>
            array (
                'id' => 21,
                'procurement_item_id' => 21,
                'procurement_type' => 'SUPPLIES',
                'price' => '550.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:24:05',
                'updated_at' => '2021-01-14 08:24:05',
            ),
            21 =>
            array (
                'id' => 22,
                'procurement_item_id' => 22,
                'procurement_type' => 'SUPPLIES',
                'price' => '88.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:24:48',
                'updated_at' => '2021-01-14 08:24:48',
            ),
            22 =>
            array (
                'id' => 23,
                'procurement_item_id' => 23,
                'procurement_type' => 'SUPPLIES',
                'price' => '88.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:25:26',
                'updated_at' => '2021-01-14 08:25:26',
            ),
            23 =>
            array (
                'id' => 24,
                'procurement_item_id' => 24,
                'procurement_type' => 'SUPPLIES',
                'price' => '221.00',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-01-14 08:26:17',
                'updated_at' => '2021-02-03 15:53:34',
            ),
            24 =>
            array (
                'id' => 25,
                'procurement_item_id' => 25,
                'procurement_type' => 'SUPPLIES',
                'price' => '208.52',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-01-14 08:28:13',
                'updated_at' => '2021-02-03 15:54:24',
            ),
            25 =>
            array (
                'id' => 26,
                'procurement_item_id' => 26,
                'procurement_type' => 'SUPPLIES',
                'price' => '88.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:28:46',
                'updated_at' => '2021-01-14 08:28:46',
            ),
            26 =>
            array (
                'id' => 27,
                'procurement_item_id' => 27,
                'procurement_type' => 'SUPPLIES',
                'price' => '83.72',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-01-14 08:29:13',
                'updated_at' => '2021-02-03 15:54:51',
            ),
            27 =>
            array (
                'id' => 28,
                'procurement_item_id' => 28,
                'procurement_type' => 'SUPPLIES',
                'price' => '30.10',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:29:33',
                'updated_at' => '2021-01-14 08:29:33',
            ),
            28 =>
            array (
                'id' => 29,
                'procurement_item_id' => 29,
                'procurement_type' => 'SUPPLIES',
                'price' => '37.04',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-01-14 08:30:05',
                'updated_at' => '2021-02-04 08:44:41',
            ),
            29 =>
            array (
                'id' => 30,
                'procurement_item_id' => 30,
                'procurement_type' => 'SUPPLIES',
                'price' => '38.41',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-01-14 08:30:24',
                'updated_at' => '2021-02-04 08:45:09',
            ),
            30 =>
            array (
                'id' => 31,
                'procurement_item_id' => 31,
                'procurement_type' => 'SUPPLIES',
                'price' => '44.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:30:51',
                'updated_at' => '2021-01-14 08:30:51',
            ),
            31 =>
            array (
                'id' => 32,
                'procurement_item_id' => 32,
                'procurement_type' => 'SUPPLIES',
                'price' => '104.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:31:13',
                'updated_at' => '2021-01-14 08:31:13',
            ),
            32 =>
            array (
                'id' => 33,
                'procurement_item_id' => 33,
                'procurement_type' => 'SUPPLIES',
                'price' => '8.73',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:31:45',
                'updated_at' => '2021-01-14 08:31:45',
            ),
            33 =>
            array (
                'id' => 34,
                'procurement_item_id' => 34,
                'procurement_type' => 'SUPPLIES',
                'price' => '18.30',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:32:04',
                'updated_at' => '2021-01-14 08:32:04',
            ),
            34 =>
            array (
                'id' => 35,
                'procurement_item_id' => 35,
                'procurement_type' => 'SUPPLIES',
                'price' => '23.69',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:32:42',
                'updated_at' => '2021-01-14 08:32:42',
            ),
            35 =>
            array (
                'id' => 36,
                'procurement_item_id' => 36,
                'procurement_type' => 'SUPPLIES',
                'price' => '48.05',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:33:20',
                'updated_at' => '2021-01-14 08:33:20',
            ),
            36 =>
            array (
                'id' => 37,
                'procurement_item_id' => 37,
                'procurement_type' => 'SUPPLIES',
                'price' => '9.74',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:33:43',
                'updated_at' => '2021-01-14 08:33:43',
            ),
            37 =>
            array (
                'id' => 38,
                'procurement_item_id' => 38,
                'procurement_type' => 'SUPPLIES',
                'price' => '84.10',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:34:08',
                'updated_at' => '2021-01-14 08:34:08',
            ),
            38 =>
            array (
                'id' => 39,
                'procurement_item_id' => 39,
                'procurement_type' => 'SUPPLIES',
                'price' => '440.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:34:36',
                'updated_at' => '2021-01-14 08:34:36',
            ),
            39 =>
            array (
                'id' => 40,
                'procurement_item_id' => 40,
                'procurement_type' => 'SUPPLIES',
                'price' => '88.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:34:56',
                'updated_at' => '2021-01-14 08:34:56',
            ),
            40 =>
            array (
                'id' => 41,
                'procurement_item_id' => 41,
                'procurement_type' => 'SUPPLIES',
                'price' => '22.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:35:26',
                'updated_at' => '2021-01-14 08:35:26',
            ),
            41 =>
            array (
                'id' => 42,
                'procurement_item_id' => 42,
                'procurement_type' => 'SUPPLIES',
                'price' => '81.19',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:35:44',
                'updated_at' => '2021-01-14 08:35:44',
            ),
            42 =>
            array (
                'id' => 43,
                'procurement_item_id' => 43,
                'procurement_type' => 'SUPPLIES',
                'price' => '79.13',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:36:08',
                'updated_at' => '2021-01-14 08:36:08',
            ),
            43 =>
            array (
                'id' => 44,
                'procurement_item_id' => 44,
                'procurement_type' => 'SUPPLIES',
                'price' => '275.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:36:26',
                'updated_at' => '2021-01-14 08:36:26',
            ),
            44 =>
            array (
                'id' => 45,
                'procurement_item_id' => 45,
                'procurement_type' => 'SUPPLIES',
                'price' => '77.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:36:51',
                'updated_at' => '2021-01-14 08:36:51',
            ),
            45 =>
            array (
                'id' => 46,
                'procurement_item_id' => 46,
                'procurement_type' => 'SUPPLIES',
                'price' => '470.54',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:37:17',
                'updated_at' => '2021-01-14 08:37:17',
            ),
            46 =>
            array (
                'id' => 47,
                'procurement_item_id' => 47,
                'procurement_type' => 'SUPPLIES',
                'price' => '597.28',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:37:54',
                'updated_at' => '2021-01-14 08:37:54',
            ),
            47 =>
            array (
                'id' => 48,
                'procurement_item_id' => 48,
                'procurement_type' => 'SUPPLIES',
                'price' => '851.29',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:38:25',
                'updated_at' => '2021-01-14 08:38:25',
            ),
            48 =>
            array (
                'id' => 49,
                'procurement_item_id' => 49,
                'procurement_type' => 'SUPPLIES',
                'price' => '38.53',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:38:46',
                'updated_at' => '2021-01-14 08:38:46',
            ),
            49 =>
            array (
                'id' => 50,
                'procurement_item_id' => 50,
                'procurement_type' => 'SUPPLIES',
                'price' => '382.36',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:39:05',
                'updated_at' => '2021-01-14 08:39:05',
            ),
            50 =>
            array (
                'id' => 51,
                'procurement_item_id' => 51,
                'procurement_type' => 'SUPPLIES',
                'price' => '477.95',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:39:28',
                'updated_at' => '2021-01-14 08:39:28',
            ),
            51 =>
            array (
                'id' => 52,
                'procurement_item_id' => 52,
                'procurement_type' => 'SUPPLIES',
                'price' => '12.93',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:39:50',
                'updated_at' => '2021-01-14 08:39:50',
            ),
            52 =>
            array (
                'id' => 53,
                'procurement_item_id' => 53,
                'procurement_type' => 'SUPPLIES',
                'price' => '6.91',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:40:08',
                'updated_at' => '2021-01-14 08:40:08',
            ),
            53 =>
            array (
                'id' => 54,
                'procurement_item_id' => 54,
                'procurement_type' => 'SUPPLIES',
                'price' => '96.46',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:40:24',
                'updated_at' => '2021-01-14 08:40:24',
            ),
            54 =>
            array (
                'id' => 55,
                'procurement_item_id' => 55,
                'procurement_type' => 'SUPPLIES',
                'price' => '91.16',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:40:47',
                'updated_at' => '2021-01-14 08:40:47',
            ),
            55 =>
            array (
                'id' => 56,
                'procurement_item_id' => 56,
                'procurement_type' => 'SUPPLIES',
                'price' => '14.39',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:41:17',
                'updated_at' => '2021-01-14 08:41:17',
            ),
            56 =>
            array (
                'id' => 57,
                'procurement_item_id' => 57,
                'procurement_type' => 'SUPPLIES',
                'price' => '19.18',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:42:00',
                'updated_at' => '2021-01-14 08:42:00',
            ),
            57 =>
            array (
                'id' => 58,
                'procurement_item_id' => 58,
                'procurement_type' => 'SUPPLIES',
                'price' => '292.02',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:42:16',
                'updated_at' => '2021-01-14 08:42:16',
            ),
            58 =>
            array (
                'id' => 59,
                'procurement_item_id' => 59,
                'procurement_type' => 'SUPPLIES',
                'price' => '335.72',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:42:32',
                'updated_at' => '2021-01-14 08:42:32',
            ),
            59 =>
            array (
                'id' => 60,
                'procurement_item_id' => 60,
                'procurement_type' => 'SUPPLIES',
                'price' => '199.05',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:42:50',
                'updated_at' => '2021-01-14 08:42:50',
            ),
            60 =>
            array (
                'id' => 61,
                'procurement_item_id' => 61,
                'procurement_type' => 'SUPPLIES',
                'price' => '248.66',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:43:10',
                'updated_at' => '2021-01-14 08:43:10',
            ),
            61 =>
            array (
                'id' => 62,
                'procurement_item_id' => 62,
                'procurement_type' => 'SUPPLIES',
                'price' => '860.88',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:44:47',
                'updated_at' => '2021-01-14 08:44:47',
            ),
            62 =>
            array (
                'id' => 63,
                'procurement_item_id' => 63,
                'procurement_type' => 'SUPPLIES',
                'price' => '250.59',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:45:07',
                'updated_at' => '2021-01-14 08:45:07',
            ),
            63 =>
            array (
                'id' => 64,
                'procurement_item_id' => 64,
                'procurement_type' => 'SUPPLIES',
                'price' => '346.37',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:45:30',
                'updated_at' => '2021-01-14 08:45:30',
            ),
            64 =>
            array (
                'id' => 65,
                'procurement_item_id' => 65,
                'procurement_type' => 'SUPPLIES',
                'price' => '56.96',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:45:46',
                'updated_at' => '2021-01-14 08:45:46',
            ),
            65 =>
            array (
                'id' => 66,
                'procurement_item_id' => 66,
                'procurement_type' => 'SUPPLIES',
                'price' => '16.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:46:04',
                'updated_at' => '2021-01-14 08:46:04',
            ),
            66 =>
            array (
                'id' => 67,
                'procurement_item_id' => 67,
                'procurement_type' => 'SUPPLIES',
                'price' => '82.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:46:22',
                'updated_at' => '2021-01-14 08:46:22',
            ),
            67 =>
            array (
                'id' => 68,
                'procurement_item_id' => 68,
                'procurement_type' => 'SUPPLIES',
                'price' => '55.92',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:46:38',
                'updated_at' => '2021-01-14 08:46:38',
            ),
            68 =>
            array (
                'id' => 69,
                'procurement_item_id' => 69,
                'procurement_type' => 'SUPPLIES',
                'price' => '55.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:46:58',
                'updated_at' => '2021-01-14 08:46:58',
            ),
            69 =>
            array (
                'id' => 70,
                'procurement_item_id' => 70,
                'procurement_type' => 'SUPPLIES',
                'price' => '749.38',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:47:19',
                'updated_at' => '2021-01-14 08:47:19',
            ),
            70 =>
            array (
                'id' => 71,
                'procurement_item_id' => 71,
                'procurement_type' => 'SUPPLIES',
                'price' => '49.19',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:47:39',
                'updated_at' => '2021-01-14 08:47:39',
            ),
            71 =>
            array (
                'id' => 72,
                'procurement_item_id' => 72,
                'procurement_type' => 'SUPPLIES',
                'price' => '275.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:48:01',
                'updated_at' => '2021-01-14 08:48:01',
            ),
            72 =>
            array (
                'id' => 73,
                'procurement_item_id' => 73,
                'procurement_type' => 'SUPPLIES',
                'price' => '42.92',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:48:16',
                'updated_at' => '2021-01-14 08:48:16',
            ),
            73 =>
            array (
                'id' => 74,
                'procurement_item_id' => 74,
                'procurement_type' => 'SUPPLIES',
                'price' => '12.98',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:48:39',
                'updated_at' => '2021-01-14 08:48:39',
            ),
            74 =>
            array (
                'id' => 75,
                'procurement_item_id' => 75,
                'procurement_type' => 'SUPPLIES',
                'price' => '12.98',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:49:30',
                'updated_at' => '2021-01-14 08:49:30',
            ),
            75 =>
            array (
                'id' => 76,
                'procurement_item_id' => 76,
                'procurement_type' => 'SUPPLIES',
                'price' => '12.98',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:49:52',
                'updated_at' => '2021-01-14 08:49:52',
            ),
            76 =>
            array (
                'id' => 77,
                'procurement_item_id' => 77,
                'procurement_type' => 'SUPPLIES',
                'price' => '11.13',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:50:28',
                'updated_at' => '2021-01-14 08:50:28',
            ),
            77 =>
            array (
                'id' => 78,
                'procurement_item_id' => 78,
                'procurement_type' => 'SUPPLIES',
                'price' => '11.13',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:50:44',
                'updated_at' => '2021-01-14 08:50:44',
            ),
            78 =>
            array (
                'id' => 79,
                'procurement_item_id' => 79,
                'procurement_type' => 'SUPPLIES',
                'price' => '11.13',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:51:21',
                'updated_at' => '2021-01-14 08:51:21',
            ),
            79 =>
            array (
                'id' => 80,
                'procurement_item_id' => 80,
                'procurement_type' => 'SUPPLIES',
                'price' => '13.88',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:51:35',
                'updated_at' => '2021-01-14 08:51:35',
            ),
            80 =>
            array (
                'id' => 81,
                'procurement_item_id' => 81,
                'procurement_type' => 'SUPPLIES',
                'price' => '37.15',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:53:37',
                'updated_at' => '2021-01-14 08:53:37',
            ),
            81 =>
            array (
                'id' => 82,
                'procurement_item_id' => 82,
                'procurement_type' => 'SUPPLIES',
                'price' => '49.14',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:54:43',
                'updated_at' => '2021-01-14 08:54:43',
            ),
            82 =>
            array (
                'id' => 83,
                'procurement_item_id' => 83,
                'procurement_type' => 'SUPPLIES',
                'price' => '65.95',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:55:14',
                'updated_at' => '2021-01-14 08:55:14',
            ),
            83 =>
            array (
                'id' => 84,
                'procurement_item_id' => 84,
                'procurement_type' => 'SUPPLIES',
                'price' => '20.19',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:55:33',
                'updated_at' => '2021-01-14 08:55:33',
            ),
            84 =>
            array (
                'id' => 85,
                'procurement_item_id' => 85,
                'procurement_type' => 'SUPPLIES',
                'price' => '7.65',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:55:48',
                'updated_at' => '2021-01-14 08:55:48',
            ),
            85 =>
            array (
                'id' => 86,
                'procurement_item_id' => 86,
                'procurement_type' => 'SUPPLIES',
                'price' => '15.57',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:56:11',
                'updated_at' => '2021-01-14 08:56:11',
            ),
            86 =>
            array (
                'id' => 87,
                'procurement_item_id' => 87,
                'procurement_type' => 'SUPPLIES',
                'price' => '152.61',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:56:35',
                'updated_at' => '2021-01-14 08:56:35',
            ),
            87 =>
            array (
                'id' => 88,
                'procurement_item_id' => 88,
                'procurement_type' => 'SUPPLIES',
                'price' => '178.41',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:56:56',
                'updated_at' => '2021-01-14 08:56:56',
            ),
            88 =>
            array (
                'id' => 89,
                'procurement_item_id' => 89,
                'procurement_type' => 'SUPPLIES',
                'price' => '110.91',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:57:16',
                'updated_at' => '2021-01-14 08:57:16',
            ),
            89 =>
            array (
                'id' => 90,
                'procurement_item_id' => 90,
                'procurement_type' => 'SUPPLIES',
                'price' => '44.55',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:57:31',
                'updated_at' => '2021-01-14 08:57:31',
            ),
            90 =>
            array (
                'id' => 91,
                'procurement_item_id' => 91,
                'procurement_type' => 'SUPPLIES',
                'price' => '38.36',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:57:50',
                'updated_at' => '2021-01-14 08:57:50',
            ),
            91 =>
            array (
                'id' => 92,
                'procurement_item_id' => 92,
                'procurement_type' => 'SUPPLIES',
                'price' => '23.97',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:58:10',
                'updated_at' => '2021-01-14 08:58:10',
            ),
            92 =>
            array (
                'id' => 93,
                'procurement_item_id' => 93,
                'procurement_type' => 'SUPPLIES',
                'price' => '165.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:58:27',
                'updated_at' => '2021-01-14 08:58:27',
            ),
            93 =>
            array (
                'id' => 94,
                'procurement_item_id' => 94,
                'procurement_type' => 'SUPPLIES',
                'price' => '38.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:58:42',
                'updated_at' => '2021-01-14 08:58:42',
            ),
            94 =>
            array (
                'id' => 95,
                'procurement_item_id' => 95,
                'procurement_type' => 'SUPPLIES',
                'price' => '38.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:59:15',
                'updated_at' => '2021-01-14 08:59:15',
            ),
            95 =>
            array (
                'id' => 96,
                'procurement_item_id' => 96,
                'procurement_type' => 'SUPPLIES',
                'price' => '385.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:59:36',
                'updated_at' => '2021-01-14 08:59:36',
            ),
            96 =>
            array (
                'id' => 97,
                'procurement_item_id' => 97,
                'procurement_type' => 'SUPPLIES',
                'price' => '33.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 08:59:51',
                'updated_at' => '2021-01-14 08:59:51',
            ),
            97 =>
            array (
                'id' => 98,
                'procurement_item_id' => 98,
                'procurement_type' => 'SUPPLIES',
                'price' => '69.54',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:00:07',
                'updated_at' => '2021-01-14 09:00:07',
            ),
            98 =>
            array (
                'id' => 99,
                'procurement_item_id' => 99,
                'procurement_type' => 'SUPPLIES',
                'price' => '296.41',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:00:25',
                'updated_at' => '2021-01-14 09:00:25',
            ),
            99 =>
            array (
                'id' => 100,
                'procurement_item_id' => 100,
                'procurement_type' => 'SUPPLIES',
                'price' => '116.44',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:00:56',
                'updated_at' => '2021-01-14 09:00:56',
            ),
            100 =>
            array (
                'id' => 101,
                'procurement_item_id' => 101,
                'procurement_type' => 'SUPPLIES',
                'price' => '17.68',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:01:11',
                'updated_at' => '2021-02-03 15:25:42',
            ),
            101 =>
            array (
                'id' => 102,
                'procurement_item_id' => 102,
                'procurement_type' => 'SUPPLIES',
                'price' => '39.91',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:01:28',
                'updated_at' => '2021-01-14 09:01:28',
            ),
            102 =>
            array (
                'id' => 103,
                'procurement_item_id' => 103,
                'procurement_type' => 'SUPPLIES',
                'price' => '39.91',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:01:48',
                'updated_at' => '2021-01-14 09:01:48',
            ),
            103 =>
            array (
                'id' => 104,
                'procurement_item_id' => 104,
                'procurement_type' => 'SUPPLIES',
                'price' => '39.91',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:02:08',
                'updated_at' => '2021-01-14 09:02:08',
            ),
            104 =>
            array (
                'id' => 105,
                'procurement_item_id' => 105,
                'procurement_type' => 'SUPPLIES',
                'price' => '110.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:02:42',
                'updated_at' => '2021-01-14 09:02:42',
            ),
            105 =>
            array (
                'id' => 106,
                'procurement_item_id' => 106,
                'procurement_type' => 'SUPPLIES',
                'price' => '28.66',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:03:07',
                'updated_at' => '2021-01-14 09:03:07',
            ),
            106 =>
            array (
                'id' => 107,
                'procurement_item_id' => 107,
                'procurement_type' => 'SUPPLIES',
                'price' => '32.19',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:03:19',
                'updated_at' => '2021-01-14 09:03:19',
            ),
            107 =>
            array (
                'id' => 108,
                'procurement_item_id' => 108,
                'procurement_type' => 'SUPPLIES',
                'price' => '23.12',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:03:46',
                'updated_at' => '2021-01-14 09:03:46',
            ),
            108 =>
            array (
                'id' => 109,
                'procurement_item_id' => 109,
                'procurement_type' => 'SUPPLIES',
                'price' => '63.55',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:04:04',
                'updated_at' => '2021-01-14 09:04:04',
            ),
            109 =>
            array (
                'id' => 110,
                'procurement_item_id' => 110,
                'procurement_type' => 'SUPPLIES',
                'price' => '122.90',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:04:20',
                'updated_at' => '2021-01-14 09:04:20',
            ),
            110 =>
            array (
                'id' => 111,
                'procurement_item_id' => 111,
                'procurement_type' => 'SUPPLIES',
                'price' => '12.57',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:04:34',
                'updated_at' => '2021-01-14 09:04:34',
            ),
            111 =>
            array (
                'id' => 112,
                'procurement_item_id' => 112,
                'procurement_type' => 'SUPPLIES',
                'price' => '36.61',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:04:57',
                'updated_at' => '2021-01-14 09:04:57',
            ),
            112 =>
            array (
                'id' => 113,
                'procurement_item_id' => 113,
                'procurement_type' => 'SUPPLIES',
                'price' => '37.74',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:05:13',
                'updated_at' => '2021-01-14 09:05:13',
            ),
            113 =>
            array (
                'id' => 114,
                'procurement_item_id' => 114,
                'procurement_type' => 'SUPPLIES',
                'price' => '77.94',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:05:32',
                'updated_at' => '2021-01-14 09:05:32',
            ),
            114 =>
            array (
                'id' => 115,
                'procurement_item_id' => 115,
                'procurement_type' => 'SUPPLIES',
                'price' => '1425.60',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:05:48',
                'updated_at' => '2021-01-14 09:05:48',
            ),
            115 =>
            array (
                'id' => 116,
                'procurement_item_id' => 116,
                'procurement_type' => 'SUPPLIES',
                'price' => '59.49',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:06:01',
                'updated_at' => '2021-01-14 09:06:01',
            ),
            116 =>
            array (
                'id' => 117,
                'procurement_item_id' => 117,
                'procurement_type' => 'SUPPLIES',
                'price' => '275.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:06:15',
                'updated_at' => '2021-01-14 09:06:15',
            ),
            117 =>
            array (
                'id' => 118,
                'procurement_item_id' => 118,
                'procurement_type' => 'SUPPLIES',
                'price' => '7.17',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:06:30',
                'updated_at' => '2021-01-14 09:06:30',
            ),
            118 =>
            array (
                'id' => 119,
                'procurement_item_id' => 119,
                'procurement_type' => 'SUPPLIES',
                'price' => '990.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:06:46',
                'updated_at' => '2021-01-14 09:06:46',
            ),
            119 =>
            array (
                'id' => 120,
                'procurement_item_id' => 120,
                'procurement_type' => 'SUPPLIES',
                'price' => '154.84',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-01-14 09:07:04',
                'updated_at' => '2021-02-03 15:35:17',
            ),
            120 =>
            array (
                'id' => 121,
                'procurement_item_id' => 121,
                'procurement_type' => 'SUPPLIES',
                'price' => '61.05',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:07:22',
                'updated_at' => '2021-01-14 09:07:22',
            ),
            121 =>
            array (
                'id' => 122,
                'procurement_item_id' => 122,
                'procurement_type' => 'SUPPLIES',
                'price' => '11.33',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:14:19',
                'updated_at' => '2021-01-14 09:14:19',
            ),
            122 =>
            array (
                'id' => 123,
                'procurement_item_id' => 123,
                'procurement_type' => 'SUPPLIES',
                'price' => '31.59',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:15:25',
                'updated_at' => '2021-01-14 09:15:25',
            ),
            123 =>
            array (
                'id' => 124,
                'procurement_item_id' => 124,
                'procurement_type' => 'SUPPLIES',
                'price' => '556.98',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:15:42',
                'updated_at' => '2021-01-14 09:15:42',
            ),
            124 =>
            array (
                'id' => 125,
                'procurement_item_id' => 125,
                'procurement_type' => 'SUPPLIES',
                'price' => '215.82',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:15:57',
                'updated_at' => '2021-01-14 09:15:57',
            ),
            125 =>
            array (
                'id' => 126,
                'procurement_item_id' => 126,
                'procurement_type' => 'SUPPLIES',
                'price' => '131.75',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:16:15',
                'updated_at' => '2021-01-14 09:16:15',
            ),
            126 =>
            array (
                'id' => 127,
                'procurement_item_id' => 127,
                'procurement_type' => 'SUPPLIES',
                'price' => '17.99',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:16:38',
                'updated_at' => '2021-01-14 09:16:38',
            ),
            127 =>
            array (
                'id' => 128,
                'procurement_item_id' => 128,
                'procurement_type' => 'SUPPLIES',
                'price' => '101.45',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:16:54',
                'updated_at' => '2021-01-14 09:16:54',
            ),
            128 =>
            array (
                'id' => 129,
                'procurement_item_id' => 129,
                'procurement_type' => 'SUPPLIES',
                'price' => '25.18',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:17:27',
                'updated_at' => '2021-01-14 09:17:27',
            ),
            129 =>
            array (
                'id' => 130,
                'procurement_item_id' => 130,
                'procurement_type' => 'SUPPLIES',
                'price' => '57.17',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:20:22',
                'updated_at' => '2021-01-14 09:20:22',
            ),
            130 =>
            array (
                'id' => 131,
                'procurement_item_id' => 131,
                'procurement_type' => 'SUPPLIES',
                'price' => '28.78',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:20:36',
                'updated_at' => '2021-01-14 09:20:36',
            ),
            131 =>
            array (
                'id' => 132,
                'procurement_item_id' => 132,
                'procurement_type' => 'SUPPLIES',
                'price' => '9534.72',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-01-14 09:21:29',
                'updated_at' => '2021-02-03 15:50:06',
            ),
            132 =>
            array (
                'id' => 133,
                'procurement_item_id' => 133,
                'procurement_type' => 'SUPPLIES',
                'price' => '55000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:21:59',
                'updated_at' => '2021-01-14 09:21:59',
            ),
            133 =>
            array (
                'id' => 134,
                'procurement_item_id' => 134,
                'procurement_type' => 'SUPPLIES',
                'price' => '346.85',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:22:28',
                'updated_at' => '2021-02-03 15:27:12',
            ),
            134 =>
            array (
                'id' => 135,
                'procurement_item_id' => 135,
                'procurement_type' => 'SUPPLIES',
                'price' => '302.75',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:22:46',
                'updated_at' => '2021-01-14 09:22:46',
            ),
            135 =>
            array (
                'id' => 136,
                'procurement_item_id' => 136,
                'procurement_type' => 'SUPPLIES',
                'price' => '3300.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:23:05',
                'updated_at' => '2021-01-14 09:23:05',
            ),
            136 =>
            array (
                'id' => 137,
                'procurement_item_id' => 137,
                'procurement_type' => 'SUPPLIES',
                'price' => '6600.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:23:22',
                'updated_at' => '2021-01-14 09:23:22',
            ),
            137 =>
            array (
                'id' => 138,
                'procurement_item_id' => 138,
                'procurement_type' => 'SUPPLIES',
                'price' => '7872.06',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:24:55',
                'updated_at' => '2021-01-14 09:24:55',
            ),
            138 =>
            array (
                'id' => 139,
                'procurement_item_id' => 139,
                'procurement_type' => 'SUPPLIES',
                'price' => '29282.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:25:19',
                'updated_at' => '2021-01-14 09:25:19',
            ),
            139 =>
            array (
                'id' => 140,
                'procurement_item_id' => 140,
                'procurement_type' => 'SUPPLIES',
                'price' => '717.20',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:25:45',
                'updated_at' => '2021-01-14 09:25:45',
            ),
            140 =>
            array (
                'id' => 141,
                'procurement_item_id' => 141,
                'procurement_type' => 'SUPPLIES',
                'price' => '1258.40',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:26:21',
                'updated_at' => '2021-01-14 09:26:21',
            ),
            141 =>
            array (
                'id' => 142,
                'procurement_item_id' => 142,
                'procurement_type' => 'SUPPLIES',
                'price' => '1160.25',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:26:49',
                'updated_at' => '2021-01-14 09:26:49',
            ),
            142 =>
            array (
                'id' => 143,
                'procurement_item_id' => 143,
                'procurement_type' => 'SUPPLIES',
                'price' => '8800.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:27:10',
                'updated_at' => '2021-01-14 09:27:10',
            ),
            143 =>
            array (
                'id' => 144,
                'procurement_item_id' => 144,
                'procurement_type' => 'SUPPLIES',
                'price' => '6600.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:27:28',
                'updated_at' => '2021-01-14 09:27:28',
            ),
            144 =>
            array (
                'id' => 145,
                'procurement_item_id' => 145,
                'procurement_type' => 'SUPPLIES',
                'price' => '1100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:27:57',
                'updated_at' => '2021-01-14 09:27:57',
            ),
            145 =>
            array (
                'id' => 146,
                'procurement_item_id' => 146,
                'procurement_type' => 'SUPPLIES',
                'price' => '1100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:28:14',
                'updated_at' => '2021-01-14 09:28:14',
            ),
            146 =>
            array (
                'id' => 147,
                'procurement_item_id' => 147,
                'procurement_type' => 'SUPPLIES',
                'price' => '5431.47',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:28:39',
                'updated_at' => '2021-01-14 09:28:39',
            ),
            147 =>
            array (
                'id' => 148,
                'procurement_item_id' => 148,
                'procurement_type' => 'SUPPLIES',
                'price' => '1258.40',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:28:59',
                'updated_at' => '2021-01-14 09:28:59',
            ),
            148 =>
            array (
                'id' => 149,
                'procurement_item_id' => 149,
                'procurement_type' => 'SUPPLIES',
                'price' => '5755.20',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:29:36',
                'updated_at' => '2021-01-14 09:29:36',
            ),
            149 =>
            array (
                'id' => 150,
                'procurement_item_id' => 150,
                'procurement_type' => 'SUPPLIES',
                'price' => '1100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:29:52',
                'updated_at' => '2021-01-14 09:29:52',
            ),
            150 =>
            array (
                'id' => 151,
                'procurement_item_id' => 151,
                'procurement_type' => 'SUPPLIES',
                'price' => '550.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:30:04',
                'updated_at' => '2021-01-14 09:30:04',
            ),
            151 =>
            array (
                'id' => 152,
                'procurement_item_id' => 152,
                'procurement_type' => 'SUPPLIES',
                'price' => '9075.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:30:22',
                'updated_at' => '2021-01-14 09:30:22',
            ),
            152 =>
            array (
                'id' => 153,
                'procurement_item_id' => 153,
                'procurement_type' => 'SUPPLIES',
                'price' => '31460.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:30:40',
                'updated_at' => '2021-01-14 09:30:40',
            ),
            153 =>
            array (
                'id' => 154,
                'procurement_item_id' => 154,
                'procurement_type' => 'SUPPLIES',
                'price' => '3300.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:30:58',
                'updated_at' => '2021-01-14 09:30:58',
            ),
            154 =>
            array (
                'id' => 155,
                'procurement_item_id' => 155,
                'procurement_type' => 'SUPPLIES',
                'price' => '10852.49',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:31:31',
                'updated_at' => '2021-01-14 09:31:31',
            ),
            155 =>
            array (
                'id' => 156,
                'procurement_item_id' => 156,
                'procurement_type' => 'SUPPLIES',
                'price' => '41720.80',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:31:55',
                'updated_at' => '2021-01-14 09:31:55',
            ),
            156 =>
            array (
                'id' => 157,
                'procurement_item_id' => 157,
                'procurement_type' => 'SUPPLIES',
                'price' => '9217.91',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:32:15',
                'updated_at' => '2021-01-14 09:32:15',
            ),
            157 =>
            array (
                'id' => 158,
                'procurement_item_id' => 158,
                'procurement_type' => 'SUPPLIES',
                'price' => '21508.30',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:32:33',
                'updated_at' => '2021-01-14 09:32:33',
            ),
            158 =>
            array (
                'id' => 159,
                'procurement_item_id' => 159,
                'procurement_type' => 'SUPPLIES',
                'price' => '11000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:32:54',
                'updated_at' => '2021-01-14 09:32:54',
            ),
            159 =>
            array (
                'id' => 160,
                'procurement_item_id' => 160,
                'procurement_type' => 'SUPPLIES',
                'price' => '1361.36',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:33:10',
                'updated_at' => '2021-01-14 09:33:10',
            ),
            160 =>
            array (
                'id' => 161,
                'procurement_item_id' => 161,
                'procurement_type' => 'SUPPLIES',
                'price' => '7260.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:33:24',
                'updated_at' => '2021-01-14 09:33:24',
            ),
            161 =>
            array (
                'id' => 162,
                'procurement_item_id' => 162,
                'procurement_type' => 'SUPPLIES',
                'price' => '14999.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:33:47',
                'updated_at' => '2021-01-14 09:33:47',
            ),
            162 =>
            array (
                'id' => 163,
                'procurement_item_id' => 163,
                'procurement_type' => 'SUPPLIES',
                'price' => '44000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:34:08',
                'updated_at' => '2021-01-14 09:34:08',
            ),
            163 =>
            array (
                'id' => 164,
                'procurement_item_id' => 164,
                'procurement_type' => 'SUPPLIES',
                'price' => '11000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:34:31',
                'updated_at' => '2021-01-14 09:34:31',
            ),
            164 =>
            array (
                'id' => 165,
                'procurement_item_id' => 165,
                'procurement_type' => 'SUPPLIES',
                'price' => '1100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:34:58',
                'updated_at' => '2021-01-14 09:34:58',
            ),
            165 =>
            array (
                'id' => 166,
                'procurement_item_id' => 166,
                'procurement_type' => 'SUPPLIES',
                'price' => '1528.73',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:35:14',
                'updated_at' => '2021-01-14 09:35:14',
            ),
            166 =>
            array (
                'id' => 167,
                'procurement_item_id' => 167,
                'procurement_type' => 'SUPPLIES',
                'price' => '55000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:35:33',
                'updated_at' => '2021-01-14 09:35:33',
            ),
            167 =>
            array (
                'id' => 168,
                'procurement_item_id' => 168,
                'procurement_type' => 'SUPPLIES',
                'price' => '55000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:35:50',
                'updated_at' => '2021-01-14 09:35:50',
            ),
            168 =>
            array (
                'id' => 169,
                'procurement_item_id' => 169,
                'procurement_type' => 'SUPPLIES',
                'price' => '737.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:36:14',
                'updated_at' => '2021-01-14 09:36:14',
            ),
            169 =>
            array (
                'id' => 170,
                'procurement_item_id' => 170,
                'procurement_type' => 'SUPPLIES',
                'price' => '4125.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:37:41',
                'updated_at' => '2021-01-14 09:37:41',
            ),
            170 =>
            array (
                'id' => 171,
                'procurement_item_id' => 171,
                'procurement_type' => 'SUPPLIES',
                'price' => '4235.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:38:17',
                'updated_at' => '2021-01-14 09:38:17',
            ),
            171 =>
            array (
                'id' => 172,
                'procurement_item_id' => 172,
                'procurement_type' => 'SUPPLIES',
                'price' => '1908.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:40:13',
                'updated_at' => '2021-01-14 09:40:13',
            ),
            172 =>
            array (
                'id' => 173,
                'procurement_item_id' => 173,
                'procurement_type' => 'SUPPLIES',
                'price' => '6875.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:41:00',
                'updated_at' => '2021-01-14 09:41:00',
            ),
            173 =>
            array (
                'id' => 174,
                'procurement_item_id' => 174,
                'procurement_type' => 'SUPPLIES',
                'price' => '2062.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:41:20',
                'updated_at' => '2021-01-14 09:41:20',
            ),
            174 =>
            array (
                'id' => 175,
                'procurement_item_id' => 175,
                'procurement_type' => 'SUPPLIES',
                'price' => '1320.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:41:35',
                'updated_at' => '2021-01-14 09:41:35',
            ),
            175 =>
            array (
                'id' => 176,
                'procurement_item_id' => 176,
                'procurement_type' => 'SUPPLIES',
                'price' => '7700.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:41:53',
                'updated_at' => '2021-01-14 09:41:53',
            ),
            176 =>
            array (
                'id' => 177,
                'procurement_item_id' => 177,
                'procurement_type' => 'SUPPLIES',
                'price' => '688.05',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:42:12',
                'updated_at' => '2021-01-14 09:42:12',
            ),
            177 =>
            array (
                'id' => 178,
                'procurement_item_id' => 178,
                'procurement_type' => 'SUPPLIES',
                'price' => '1468.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:42:30',
                'updated_at' => '2021-01-14 09:42:30',
            ),
            178 =>
            array (
                'id' => 179,
                'procurement_item_id' => 179,
                'procurement_type' => 'SUPPLIES',
                'price' => '14999.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:42:55',
                'updated_at' => '2021-01-14 09:42:55',
            ),
            179 =>
            array (
                'id' => 180,
                'procurement_item_id' => 180,
                'procurement_type' => 'SUPPLIES',
                'price' => '25.12',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:43:27',
                'updated_at' => '2021-01-14 09:43:27',
            ),
            180 =>
            array (
                'id' => 181,
                'procurement_item_id' => 181,
                'procurement_type' => 'SUPPLIES',
                'price' => '2200.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:43:55',
                'updated_at' => '2021-01-14 09:43:55',
            ),
            181 =>
            array (
                'id' => 182,
                'procurement_item_id' => 182,
                'procurement_type' => 'SUPPLIES',
                'price' => '3440.80',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:44:51',
                'updated_at' => '2021-01-14 09:44:51',
            ),
            182 =>
            array (
                'id' => 183,
                'procurement_item_id' => 183,
                'procurement_type' => 'SUPPLIES',
                'price' => '3495.09',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:45:14',
                'updated_at' => '2021-01-14 09:45:14',
            ),
            183 =>
            array (
                'id' => 184,
                'procurement_item_id' => 184,
                'procurement_type' => 'SUPPLIES',
                'price' => '11000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:45:36',
                'updated_at' => '2021-01-14 09:45:36',
            ),
            184 =>
            array (
                'id' => 185,
                'procurement_item_id' => 185,
                'procurement_type' => 'SUPPLIES',
                'price' => '318.93',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:45:55',
                'updated_at' => '2021-01-14 09:45:55',
            ),
            185 =>
            array (
                'id' => 186,
                'procurement_item_id' => 186,
                'procurement_type' => 'SUPPLIES',
                'price' => '990.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:46:15',
                'updated_at' => '2021-01-14 09:46:15',
            ),
            186 =>
            array (
                'id' => 187,
                'procurement_item_id' => 187,
                'procurement_type' => 'SUPPLIES',
                'price' => '11000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:46:36',
                'updated_at' => '2021-01-14 09:46:36',
            ),
            187 =>
            array (
                'id' => 188,
                'procurement_item_id' => 188,
                'procurement_type' => 'SUPPLIES',
                'price' => '550.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:47:07',
                'updated_at' => '2021-01-14 09:47:07',
            ),
            188 =>
            array (
                'id' => 189,
                'procurement_item_id' => 189,
                'procurement_type' => 'SUPPLIES',
                'price' => '550.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:47:24',
                'updated_at' => '2021-01-14 09:47:24',
            ),
            189 =>
            array (
                'id' => 190,
                'procurement_item_id' => 190,
                'procurement_type' => 'SUPPLIES',
                'price' => '14999.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:47:40',
                'updated_at' => '2021-01-14 09:47:40',
            ),
            190 =>
            array (
                'id' => 191,
                'procurement_item_id' => 191,
                'procurement_type' => 'SUPPLIES',
                'price' => '1100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:48:14',
                'updated_at' => '2021-01-14 09:48:14',
            ),
            191 =>
            array (
                'id' => 192,
                'procurement_item_id' => 192,
                'procurement_type' => 'SUPPLIES',
                'price' => '13612.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:49:22',
                'updated_at' => '2021-01-14 09:49:22',
            ),
            192 =>
            array (
                'id' => 193,
                'procurement_item_id' => 193,
                'procurement_type' => 'SUPPLIES',
                'price' => '11000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:49:42',
                'updated_at' => '2021-01-14 09:49:42',
            ),
            193 =>
            array (
                'id' => 194,
                'procurement_item_id' => 194,
                'procurement_type' => 'SUPPLIES',
                'price' => '11000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:49:57',
                'updated_at' => '2021-01-14 09:49:57',
            ),
            194 =>
            array (
                'id' => 195,
                'procurement_item_id' => 195,
                'procurement_type' => 'SUPPLIES',
                'price' => '2062.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:50:15',
                'updated_at' => '2021-01-14 09:50:15',
            ),
            195 =>
            array (
                'id' => 196,
                'procurement_item_id' => 196,
                'procurement_type' => 'SUPPLIES',
                'price' => '8800.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:50:36',
                'updated_at' => '2021-01-14 09:50:36',
            ),
            196 =>
            array (
                'id' => 197,
                'procurement_item_id' => 197,
                'procurement_type' => 'SUPPLIES',
                'price' => '1375.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:50:51',
                'updated_at' => '2021-01-14 09:50:51',
            ),
            197 =>
            array (
                'id' => 198,
                'procurement_item_id' => 198,
                'procurement_type' => 'SUPPLIES',
                'price' => '5500.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:51:16',
                'updated_at' => '2021-01-14 09:51:16',
            ),
            198 =>
            array (
                'id' => 199,
                'procurement_item_id' => 199,
                'procurement_type' => 'SUPPLIES',
                'price' => '220.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:51:32',
                'updated_at' => '2021-01-14 09:51:32',
            ),
            199 =>
            array (
                'id' => 200,
                'procurement_item_id' => 200,
                'procurement_type' => 'SUPPLIES',
                'price' => '155.69',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:51:48',
                'updated_at' => '2021-01-14 09:51:48',
            ),
            200 =>
            array (
                'id' => 201,
                'procurement_item_id' => 201,
                'procurement_type' => 'SUPPLIES',
                'price' => '3300.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:52:04',
                'updated_at' => '2021-01-14 09:52:04',
            ),
            201 =>
            array (
                'id' => 202,
                'procurement_item_id' => 202,
                'procurement_type' => 'SUPPLIES',
                'price' => '2750.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:52:30',
                'updated_at' => '2021-01-14 09:52:30',
            ),
            202 =>
            array (
                'id' => 203,
                'procurement_item_id' => 203,
                'procurement_type' => 'SUPPLIES',
                'price' => '4950.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:52:49',
                'updated_at' => '2021-01-14 09:52:49',
            ),
            203 =>
            array (
                'id' => 204,
                'procurement_item_id' => 204,
                'procurement_type' => 'SUPPLIES',
                'price' => '2750.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:53:09',
                'updated_at' => '2021-01-14 09:53:09',
            ),
            204 =>
            array (
                'id' => 205,
                'procurement_item_id' => 205,
                'procurement_type' => 'SUPPLIES',
                'price' => '3300.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:53:37',
                'updated_at' => '2021-01-14 09:53:37',
            ),
            205 =>
            array (
                'id' => 206,
                'procurement_item_id' => 206,
                'procurement_type' => 'SUPPLIES',
                'price' => '4194.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:53:53',
                'updated_at' => '2021-01-14 09:53:53',
            ),
            206 =>
            array (
                'id' => 207,
                'procurement_item_id' => 207,
                'procurement_type' => 'SUPPLIES',
                'price' => '5500.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:54:09',
                'updated_at' => '2021-01-14 09:54:09',
            ),
            207 =>
            array (
                'id' => 208,
                'procurement_item_id' => 208,
                'procurement_type' => 'SUPPLIES',
                'price' => '1100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:54:25',
                'updated_at' => '2021-01-14 09:54:25',
            ),
            208 =>
            array (
                'id' => 209,
                'procurement_item_id' => 209,
                'procurement_type' => 'SUPPLIES',
                'price' => '2750.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:54:44',
                'updated_at' => '2021-01-14 09:54:44',
            ),
            209 =>
            array (
                'id' => 210,
                'procurement_item_id' => 210,
                'procurement_type' => 'SUPPLIES',
                'price' => '880.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:55:17',
                'updated_at' => '2021-01-14 09:55:17',
            ),
            210 =>
            array (
                'id' => 211,
                'procurement_item_id' => 211,
                'procurement_type' => 'SUPPLIES',
                'price' => '1510.67',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:55:33',
                'updated_at' => '2021-01-14 09:55:33',
            ),
            211 =>
            array (
                'id' => 212,
                'procurement_item_id' => 212,
                'procurement_type' => 'SUPPLIES',
                'price' => '53.36',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:56:05',
                'updated_at' => '2021-01-14 09:56:05',
            ),
            212 =>
            array (
                'id' => 213,
                'procurement_item_id' => 213,
                'procurement_type' => 'SUPPLIES',
                'price' => '429.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:57:01',
                'updated_at' => '2021-01-14 09:57:01',
            ),
            213 =>
            array (
                'id' => 214,
                'procurement_item_id' => 214,
                'procurement_type' => 'SUPPLIES',
                'price' => '429.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:57:14',
                'updated_at' => '2021-01-14 09:57:14',
            ),
            214 =>
            array (
                'id' => 215,
                'procurement_item_id' => 215,
                'procurement_type' => 'SUPPLIES',
                'price' => '429.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:57:32',
                'updated_at' => '2021-01-14 09:57:32',
            ),
            215 =>
            array (
                'id' => 216,
                'procurement_item_id' => 216,
                'procurement_type' => 'SUPPLIES',
                'price' => '429.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:58:08',
                'updated_at' => '2021-01-14 09:58:08',
            ),
            216 =>
            array (
                'id' => 217,
                'procurement_item_id' => 217,
                'procurement_type' => 'SUPPLIES',
                'price' => '899.25',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:58:25',
                'updated_at' => '2021-01-14 09:58:25',
            ),
            217 =>
            array (
                'id' => 218,
                'procurement_item_id' => 218,
                'procurement_type' => 'SUPPLIES',
                'price' => '1187.01',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:58:42',
                'updated_at' => '2021-01-14 09:58:42',
            ),
            218 =>
            array (
                'id' => 219,
                'procurement_item_id' => 219,
                'procurement_type' => 'SUPPLIES',
                'price' => '2200.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:59:02',
                'updated_at' => '2021-01-14 09:59:02',
            ),
            219 =>
            array (
                'id' => 220,
                'procurement_item_id' => 220,
                'procurement_type' => 'SUPPLIES',
                'price' => '2200.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:59:17',
                'updated_at' => '2021-01-14 09:59:17',
            ),
            220 =>
            array (
                'id' => 221,
                'procurement_item_id' => 221,
                'procurement_type' => 'SUPPLIES',
                'price' => '412.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 09:59:40',
                'updated_at' => '2021-01-14 09:59:40',
            ),
            221 =>
            array (
                'id' => 222,
                'procurement_item_id' => 222,
                'procurement_type' => 'SUPPLIES',
                'price' => '412.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:00:01',
                'updated_at' => '2021-01-14 10:00:01',
            ),
            222 =>
            array (
                'id' => 223,
                'procurement_item_id' => 223,
                'procurement_type' => 'SUPPLIES',
                'price' => '412.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:00:19',
                'updated_at' => '2021-01-14 10:00:19',
            ),
            223 =>
            array (
                'id' => 224,
                'procurement_item_id' => 224,
                'procurement_type' => 'SUPPLIES',
                'price' => '412.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:00:36',
                'updated_at' => '2021-01-14 10:00:36',
            ),
            224 =>
            array (
                'id' => 225,
                'procurement_item_id' => 225,
                'procurement_type' => 'SUPPLIES',
                'price' => '293.76',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:00:56',
                'updated_at' => '2021-01-14 10:00:56',
            ),
            225 =>
            array (
                'id' => 226,
                'procurement_item_id' => 226,
                'procurement_type' => 'SUPPLIES',
                'price' => '293.76',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:01:17',
                'updated_at' => '2021-01-14 10:01:17',
            ),
            226 =>
            array (
                'id' => 227,
                'procurement_item_id' => 227,
                'procurement_type' => 'SUPPLIES',
                'price' => '293.76',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:01:31',
                'updated_at' => '2021-01-14 10:01:31',
            ),
            227 =>
            array (
                'id' => 228,
                'procurement_item_id' => 228,
                'procurement_type' => 'SUPPLIES',
                'price' => '293.76',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:02:53',
                'updated_at' => '2021-01-14 10:02:53',
            ),
            228 =>
            array (
                'id' => 229,
                'procurement_item_id' => 229,
                'procurement_type' => 'SUPPLIES',
                'price' => '420.85',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:04:30',
                'updated_at' => '2021-01-14 10:04:30',
            ),
            229 =>
            array (
                'id' => 230,
                'procurement_item_id' => 230,
                'procurement_type' => 'SUPPLIES',
                'price' => '420.85',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:04:45',
                'updated_at' => '2021-01-14 10:04:45',
            ),
            230 =>
            array (
                'id' => 231,
                'procurement_item_id' => 231,
                'procurement_type' => 'SUPPLIES',
                'price' => '465.58',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:05:06',
                'updated_at' => '2021-01-14 10:05:06',
            ),
            231 =>
            array (
                'id' => 232,
                'procurement_item_id' => 232,
                'procurement_type' => 'SUPPLIES',
                'price' => '465.58',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:05:25',
                'updated_at' => '2021-01-14 10:05:25',
            ),
            232 =>
            array (
                'id' => 233,
                'procurement_item_id' => 233,
                'procurement_type' => 'SUPPLIES',
                'price' => '1969.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:05:44',
                'updated_at' => '2021-01-14 10:05:44',
            ),
            233 =>
            array (
                'id' => 234,
                'procurement_item_id' => 234,
                'procurement_type' => 'SUPPLIES',
                'price' => '4169.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:06:07',
                'updated_at' => '2021-01-14 10:06:07',
            ),
            234 =>
            array (
                'id' => 235,
                'procurement_item_id' => 235,
                'procurement_type' => 'SUPPLIES',
                'price' => '4081.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:06:36',
                'updated_at' => '2021-01-14 10:06:36',
            ),
            235 =>
            array (
                'id' => 236,
                'procurement_item_id' => 236,
                'procurement_type' => 'SUPPLIES',
                'price' => '3231.31',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:07:01',
                'updated_at' => '2021-01-14 10:07:01',
            ),
            236 =>
            array (
                'id' => 237,
                'procurement_item_id' => 237,
                'procurement_type' => 'SUPPLIES',
                'price' => '3710.91',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:07:37',
                'updated_at' => '2021-01-14 10:07:37',
            ),
            237 =>
            array (
                'id' => 238,
                'procurement_item_id' => 238,
                'procurement_type' => 'SUPPLIES',
                'price' => '3335.62',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:07:59',
                'updated_at' => '2021-01-14 10:07:59',
            ),
            238 =>
            array (
                'id' => 239,
                'procurement_item_id' => 239,
                'procurement_type' => 'SUPPLIES',
                'price' => '7787.51',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:08:19',
                'updated_at' => '2021-01-14 10:08:19',
            ),
            239 =>
            array (
                'id' => 240,
                'procurement_item_id' => 240,
                'procurement_type' => 'SUPPLIES',
                'price' => '3960.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:08:37',
                'updated_at' => '2021-01-14 10:08:37',
            ),
            240 =>
            array (
                'id' => 241,
                'procurement_item_id' => 241,
                'procurement_type' => 'SUPPLIES',
                'price' => '4605.12',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:09:14',
                'updated_at' => '2021-01-14 10:09:14',
            ),
            241 =>
            array (
                'id' => 242,
                'procurement_item_id' => 242,
                'procurement_type' => 'SUPPLIES',
                'price' => '4896.62',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:09:45',
                'updated_at' => '2021-01-14 10:09:45',
            ),
            242 =>
            array (
                'id' => 243,
                'procurement_item_id' => 243,
                'procurement_type' => 'SUPPLIES',
                'price' => '4896.62',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:10:05',
                'updated_at' => '2021-01-14 10:10:05',
            ),
            243 =>
            array (
                'id' => 244,
                'procurement_item_id' => 244,
                'procurement_type' => 'SUPPLIES',
                'price' => '4896.62',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:10:25',
                'updated_at' => '2021-01-14 10:10:25',
            ),
            244 =>
            array (
                'id' => 245,
                'procurement_item_id' => 245,
                'procurement_type' => 'SUPPLIES',
                'price' => '84.43',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:10:43',
                'updated_at' => '2021-01-14 10:10:43',
            ),
            245 =>
            array (
                'id' => 246,
                'procurement_item_id' => 246,
                'procurement_type' => 'SUPPLIES',
                'price' => '275.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:16:17',
                'updated_at' => '2021-01-14 10:16:17',
            ),
            246 =>
            array (
                'id' => 247,
                'procurement_item_id' => 247,
                'procurement_type' => 'SUPPLIES',
                'price' => '110.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:16:48',
                'updated_at' => '2021-01-14 10:16:48',
            ),
            247 =>
            array (
                'id' => 248,
                'procurement_item_id' => 248,
                'procurement_type' => 'SUPPLIES',
                'price' => '660.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:17:18',
                'updated_at' => '2021-01-14 10:17:18',
            ),
            248 =>
            array (
                'id' => 249,
                'procurement_item_id' => 249,
                'procurement_type' => 'SUPPLIES',
                'price' => '66.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:17:37',
                'updated_at' => '2021-01-14 10:17:37',
            ),
            249 =>
            array (
                'id' => 250,
                'procurement_item_id' => 250,
                'procurement_type' => 'SUPPLIES',
                'price' => '1100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:18:00',
                'updated_at' => '2021-01-14 10:18:00',
            ),
            250 =>
            array (
                'id' => 251,
                'procurement_item_id' => 251,
                'procurement_type' => 'SUPPLIES',
                'price' => '385.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:18:36',
                'updated_at' => '2021-01-14 10:18:36',
            ),
            251 =>
            array (
                'id' => 252,
                'procurement_item_id' => 252,
                'procurement_type' => 'SUPPLIES',
                'price' => '6050.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:18:53',
                'updated_at' => '2021-01-14 10:18:53',
            ),
            252 =>
            array (
                'id' => 253,
                'procurement_item_id' => 253,
                'procurement_type' => 'SUPPLIES',
                'price' => '1100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:19:24',
                'updated_at' => '2021-01-14 10:19:24',
            ),
            253 =>
            array (
                'id' => 254,
                'procurement_item_id' => 254,
                'procurement_type' => 'SUPPLIES',
                'price' => '440.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:19:53',
                'updated_at' => '2021-01-14 10:19:53',
            ),
            254 =>
            array (
                'id' => 255,
                'procurement_item_id' => 255,
                'procurement_type' => 'SUPPLIES',
                'price' => '2200.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:20:14',
                'updated_at' => '2021-01-14 10:20:14',
            ),
            255 =>
            array (
                'id' => 256,
                'procurement_item_id' => 256,
                'procurement_type' => 'SUPPLIES',
                'price' => '11.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:20:29',
                'updated_at' => '2021-01-14 10:20:29',
            ),
            256 =>
            array (
                'id' => 257,
                'procurement_item_id' => 257,
                'procurement_type' => 'SUPPLIES',
                'price' => '1650.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:21:03',
                'updated_at' => '2021-01-14 10:21:03',
            ),
            257 =>
            array (
                'id' => 258,
                'procurement_item_id' => 258,
                'procurement_type' => 'SUPPLIES',
                'price' => '6600.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:22:00',
                'updated_at' => '2021-01-14 10:22:00',
            ),
            258 =>
            array (
                'id' => 259,
                'procurement_item_id' => 259,
                'procurement_type' => 'SUPPLIES',
                'price' => '11.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:22:17',
                'updated_at' => '2021-01-14 10:22:17',
            ),
            259 =>
            array (
                'id' => 260,
                'procurement_item_id' => 260,
                'procurement_type' => 'SUPPLIES',
                'price' => '660.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:22:36',
                'updated_at' => '2021-01-14 10:22:36',
            ),
            260 =>
            array (
                'id' => 261,
                'procurement_item_id' => 261,
                'procurement_type' => 'SUPPLIES',
                'price' => '550.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:22:55',
                'updated_at' => '2021-01-14 10:22:55',
            ),
            261 =>
            array (
                'id' => 262,
                'procurement_item_id' => 262,
                'procurement_type' => 'SUPPLIES',
                'price' => '800.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:25:27',
                'updated_at' => '2021-01-14 10:25:27',
            ),
            262 =>
            array (
                'id' => 263,
                'procurement_item_id' => 263,
                'procurement_type' => 'SUPPLIES',
                'price' => '530.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:27:38',
                'updated_at' => '2021-01-14 10:27:38',
            ),
            263 =>
            array (
                'id' => 264,
                'procurement_item_id' => 264,
                'procurement_type' => 'SUPPLIES',
                'price' => '160.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:28:00',
                'updated_at' => '2021-01-14 10:28:00',
            ),
            264 =>
            array (
                'id' => 265,
                'procurement_item_id' => 265,
                'procurement_type' => 'SUPPLIES',
                'price' => '120.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:28:14',
                'updated_at' => '2021-01-14 10:28:14',
            ),
            265 =>
            array (
                'id' => 266,
                'procurement_item_id' => 266,
                'procurement_type' => 'SUPPLIES',
                'price' => '100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:28:29',
                'updated_at' => '2021-01-14 10:28:29',
            ),
            266 =>
            array (
                'id' => 267,
                'procurement_item_id' => 267,
                'procurement_type' => 'SUPPLIES',
                'price' => '80.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:28:44',
                'updated_at' => '2021-01-14 10:28:44',
            ),
            267 =>
            array (
                'id' => 268,
                'procurement_item_id' => 268,
                'procurement_type' => 'SUPPLIES',
                'price' => '42.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:29:04',
                'updated_at' => '2021-01-14 10:29:04',
            ),
            268 =>
            array (
                'id' => 269,
                'procurement_item_id' => 269,
                'procurement_type' => 'SUPPLIES',
                'price' => '32.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:29:19',
                'updated_at' => '2021-01-14 10:29:19',
            ),
            269 =>
            array (
                'id' => 270,
                'procurement_item_id' => 270,
                'procurement_type' => 'SUPPLIES',
                'price' => '4400.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:29:42',
                'updated_at' => '2021-01-14 10:29:42',
            ),
            270 =>
            array (
                'id' => 271,
                'procurement_item_id' => 271,
                'procurement_type' => 'SUPPLIES',
                'price' => '605.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:30:01',
                'updated_at' => '2021-01-14 10:30:01',
            ),
            271 =>
            array (
                'id' => 272,
                'procurement_item_id' => 272,
                'procurement_type' => 'SUPPLIES',
                'price' => '330.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:30:18',
                'updated_at' => '2021-01-14 10:30:18',
            ),
            272 =>
            array (
                'id' => 273,
                'procurement_item_id' => 273,
                'procurement_type' => 'SUPPLIES',
                'price' => '605.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:30:34',
                'updated_at' => '2021-01-14 10:30:34',
            ),
            273 =>
            array (
                'id' => 274,
                'procurement_item_id' => 274,
                'procurement_type' => 'SUPPLIES',
                'price' => '22.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:30:54',
                'updated_at' => '2021-01-14 10:30:54',
            ),
            274 =>
            array (
                'id' => 275,
                'procurement_item_id' => 275,
                'procurement_type' => 'SUPPLIES',
                'price' => '44.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:31:13',
                'updated_at' => '2021-01-14 10:31:13',
            ),
            275 =>
            array (
                'id' => 276,
                'procurement_item_id' => 276,
                'procurement_type' => 'SUPPLIES',
                'price' => '44.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:31:31',
                'updated_at' => '2021-01-14 10:31:31',
            ),
            276 =>
            array (
                'id' => 277,
                'procurement_item_id' => 277,
                'procurement_type' => 'SUPPLIES',
                'price' => '44.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:31:57',
                'updated_at' => '2021-01-14 10:31:57',
            ),
            277 =>
            array (
                'id' => 278,
                'procurement_item_id' => 278,
                'procurement_type' => 'SUPPLIES',
                'price' => '44.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:32:10',
                'updated_at' => '2021-01-14 10:32:10',
            ),
            278 =>
            array (
                'id' => 279,
                'procurement_item_id' => 279,
                'procurement_type' => 'SUPPLIES',
                'price' => '52.80',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:32:48',
                'updated_at' => '2021-01-14 10:32:48',
            ),
            279 =>
            array (
                'id' => 280,
                'procurement_item_id' => 280,
                'procurement_type' => 'SUPPLIES',
                'price' => '52.80',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:33:31',
                'updated_at' => '2021-01-14 10:33:31',
            ),
            280 =>
            array (
                'id' => 281,
                'procurement_item_id' => 281,
                'procurement_type' => 'SUPPLIES',
                'price' => '52.80',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:33:50',
                'updated_at' => '2021-01-14 10:33:50',
            ),
            281 =>
            array (
                'id' => 282,
                'procurement_item_id' => 282,
                'procurement_type' => 'SUPPLIES',
                'price' => '52.80',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:34:06',
                'updated_at' => '2021-01-14 10:34:06',
            ),
            282 =>
            array (
                'id' => 283,
                'procurement_item_id' => 283,
                'procurement_type' => 'SUPPLIES',
                'price' => '52.80',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:34:27',
                'updated_at' => '2021-01-14 10:34:27',
            ),
            283 =>
            array (
                'id' => 284,
                'procurement_item_id' => 284,
                'procurement_type' => 'SUPPLIES',
                'price' => '52.80',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:34:44',
                'updated_at' => '2021-01-14 10:34:44',
            ),
            284 =>
            array (
                'id' => 285,
                'procurement_item_id' => 285,
                'procurement_type' => 'SUPPLIES',
                'price' => '52.80',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:35:05',
                'updated_at' => '2021-01-14 10:35:05',
            ),
            285 =>
            array (
                'id' => 286,
                'procurement_item_id' => 286,
                'procurement_type' => 'SUPPLIES',
                'price' => '396.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:35:24',
                'updated_at' => '2021-01-14 10:35:24',
            ),
            286 =>
            array (
                'id' => 287,
                'procurement_item_id' => 287,
                'procurement_type' => 'SUPPLIES',
                'price' => '660.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:35:39',
                'updated_at' => '2021-01-14 10:35:39',
            ),
            287 =>
            array (
                'id' => 288,
                'procurement_item_id' => 288,
                'procurement_type' => 'SUPPLIES',
                'price' => '707.14',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:35:57',
                'updated_at' => '2021-01-14 10:35:57',
            ),
            288 =>
            array (
                'id' => 289,
                'procurement_item_id' => 289,
                'procurement_type' => 'SUPPLIES',
                'price' => '550.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:36:13',
                'updated_at' => '2021-01-14 10:36:13',
            ),
            289 =>
            array (
                'id' => 290,
                'procurement_item_id' => 290,
                'procurement_type' => 'SUPPLIES',
                'price' => '905.88',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:36:34',
                'updated_at' => '2021-01-14 10:36:34',
            ),
            290 =>
            array (
                'id' => 291,
                'procurement_item_id' => 291,
                'procurement_type' => 'SUPPLIES',
                'price' => '1320.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:36:59',
                'updated_at' => '2021-01-14 10:36:59',
            ),
            291 =>
            array (
                'id' => 292,
                'procurement_item_id' => 292,
                'procurement_type' => 'SUPPLIES',
                'price' => '22.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:37:14',
                'updated_at' => '2021-01-14 10:37:14',
            ),
            292 =>
            array (
                'id' => 293,
                'procurement_item_id' => 293,
                'procurement_type' => 'SUPPLIES',
                'price' => '2750.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:37:29',
                'updated_at' => '2021-01-14 10:37:29',
            ),
            293 =>
            array (
                'id' => 294,
                'procurement_item_id' => 294,
                'procurement_type' => 'SUPPLIES',
                'price' => '396.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:38:02',
                'updated_at' => '2021-01-14 10:38:02',
            ),
            294 =>
            array (
                'id' => 295,
                'procurement_item_id' => 295,
                'procurement_type' => 'SUPPLIES',
                'price' => '264.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:38:22',
                'updated_at' => '2021-01-14 10:38:22',
            ),
            295 =>
            array (
                'id' => 296,
                'procurement_item_id' => 296,
                'procurement_type' => 'SUPPLIES',
                'price' => '110.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:38:46',
                'updated_at' => '2021-01-14 10:38:46',
            ),
            296 =>
            array (
                'id' => 297,
                'procurement_item_id' => 297,
                'procurement_type' => 'SUPPLIES',
                'price' => '1100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:39:06',
                'updated_at' => '2021-01-14 10:39:06',
            ),
            297 =>
            array (
                'id' => 298,
                'procurement_item_id' => 298,
                'procurement_type' => 'SUPPLIES',
                'price' => '2200.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:39:23',
                'updated_at' => '2021-01-14 10:39:23',
            ),
            298 =>
            array (
                'id' => 299,
                'procurement_item_id' => 299,
                'procurement_type' => 'SUPPLIES',
                'price' => '396.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:39:41',
                'updated_at' => '2021-01-14 10:39:41',
            ),
            299 =>
            array (
                'id' => 300,
                'procurement_item_id' => 300,
                'procurement_type' => 'SUPPLIES',
                'price' => '396.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:40:23',
                'updated_at' => '2021-01-14 10:40:23',
            ),
            300 =>
            array (
                'id' => 301,
                'procurement_item_id' => 301,
                'procurement_type' => 'SUPPLIES',
                'price' => '2200.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:40:37',
                'updated_at' => '2021-01-14 10:40:37',
            ),
            301 =>
            array (
                'id' => 302,
                'procurement_item_id' => 302,
                'procurement_type' => 'SUPPLIES',
                'price' => '2200.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:41:00',
                'updated_at' => '2021-01-14 10:41:00',
            ),
            302 =>
            array (
                'id' => 303,
                'procurement_item_id' => 303,
                'procurement_type' => 'SUPPLIES',
                'price' => '2200.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:41:13',
                'updated_at' => '2021-01-14 10:41:13',
            ),
            303 =>
            array (
                'id' => 304,
                'procurement_item_id' => 304,
                'procurement_type' => 'SUPPLIES',
                'price' => '2200.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:41:30',
                'updated_at' => '2021-01-14 10:41:30',
            ),
            304 =>
            array (
                'id' => 305,
                'procurement_item_id' => 305,
                'procurement_type' => 'SUPPLIES',
                'price' => '4400.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:41:58',
                'updated_at' => '2021-01-14 10:41:58',
            ),
            305 =>
            array (
                'id' => 306,
                'procurement_item_id' => 306,
                'procurement_type' => 'SUPPLIES',
                'price' => '4400.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:42:17',
                'updated_at' => '2021-01-14 10:42:17',
            ),
            306 =>
            array (
                'id' => 307,
                'procurement_item_id' => 307,
                'procurement_type' => 'SUPPLIES',
                'price' => '4400.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:42:36',
                'updated_at' => '2021-01-14 10:42:36',
            ),
            307 =>
            array (
                'id' => 308,
                'procurement_item_id' => 308,
                'procurement_type' => 'SUPPLIES',
                'price' => '7700.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:42:52',
                'updated_at' => '2021-01-14 10:42:52',
            ),
            308 =>
            array (
                'id' => 309,
                'procurement_item_id' => 309,
                'procurement_type' => 'SUPPLIES',
                'price' => '7920.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:43:05',
                'updated_at' => '2021-01-14 10:43:05',
            ),
            309 =>
            array (
                'id' => 310,
                'procurement_item_id' => 310,
                'procurement_type' => 'SUPPLIES',
                'price' => '8250.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:43:25',
                'updated_at' => '2021-01-14 10:43:25',
            ),
            310 =>
            array (
                'id' => 311,
                'procurement_item_id' => 311,
                'procurement_type' => 'SUPPLIES',
                'price' => '1100.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:43:39',
                'updated_at' => '2021-01-14 10:43:39',
            ),
            311 =>
            array (
                'id' => 312,
                'procurement_item_id' => 312,
                'procurement_type' => 'SUPPLIES',
                'price' => '35.70',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:43:56',
                'updated_at' => '2021-01-14 10:43:56',
            ),
            312 =>
            array (
                'id' => 313,
                'procurement_item_id' => 313,
                'procurement_type' => 'SUPPLIES',
                'price' => '385.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:44:24',
                'updated_at' => '2021-01-14 10:44:24',
            ),
            313 =>
            array (
                'id' => 314,
                'procurement_item_id' => 314,
                'procurement_type' => 'SUPPLIES',
                'price' => '165000.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:44:46',
                'updated_at' => '2021-01-14 10:44:46',
            ),
            314 =>
            array (
                'id' => 315,
                'procurement_item_id' => 315,
                'procurement_type' => 'SUPPLIES',
                'price' => '260.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:45:23',
                'updated_at' => '2021-01-14 10:45:23',
            ),
            315 =>
            array (
                'id' => 316,
                'procurement_item_id' => 316,
                'procurement_type' => 'SUPPLIES',
                'price' => '2500.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:45:41',
                'updated_at' => '2021-01-14 10:45:41',
            ),
            316 =>
            array (
                'id' => 317,
                'procurement_item_id' => 317,
                'procurement_type' => 'SUPPLIES',
                'price' => '550.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:48:26',
                'updated_at' => '2021-01-14 10:48:26',
            ),
            317 =>
            array (
                'id' => 318,
                'procurement_item_id' => 318,
                'procurement_type' => 'SUPPLIES',
                'price' => '770.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:48:59',
                'updated_at' => '2021-01-14 10:48:59',
            ),
            318 =>
            array (
                'id' => 319,
                'procurement_item_id' => 319,
                'procurement_type' => 'SUPPLIES',
                'price' => '550.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:49:17',
                'updated_at' => '2021-01-14 10:49:17',
            ),
            319 =>
            array (
                'id' => 320,
                'procurement_item_id' => 320,
                'procurement_type' => 'SUPPLIES',
                'price' => '770.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:49:45',
                'updated_at' => '2021-01-14 10:49:45',
            ),
            320 =>
            array (
                'id' => 321,
                'procurement_item_id' => 321,
                'procurement_type' => 'SUPPLIES',
                'price' => '880.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:50:02',
                'updated_at' => '2021-01-14 10:50:02',
            ),
            321 =>
            array (
                'id' => 322,
                'procurement_item_id' => 322,
                'procurement_type' => 'SUPPLIES',
                'price' => '880.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:50:18',
                'updated_at' => '2021-01-14 10:50:18',
            ),
            322 =>
            array (
                'id' => 323,
                'procurement_item_id' => 323,
                'procurement_type' => 'SUPPLIES',
                'price' => '550.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:50:33',
                'updated_at' => '2021-01-14 10:50:33',
            ),
            323 =>
            array (
                'id' => 324,
                'procurement_item_id' => 324,
                'procurement_type' => 'SUPPLIES',
                'price' => '23.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:50:52',
                'updated_at' => '2021-01-14 10:50:52',
            ),
            324 =>
            array (
                'id' => 325,
                'procurement_item_id' => 325,
                'procurement_type' => 'SUPPLIES',
                'price' => '5500.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:51:11',
                'updated_at' => '2021-01-14 10:51:11',
            ),
            325 =>
            array (
                'id' => 326,
                'procurement_item_id' => 326,
                'procurement_type' => 'SUPPLIES',
                'price' => '5500.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:51:29',
                'updated_at' => '2021-01-14 10:51:29',
            ),
            326 =>
            array (
                'id' => 327,
                'procurement_item_id' => 327,
                'procurement_type' => 'SUPPLIES',
                'price' => '38.50',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:51:56',
                'updated_at' => '2021-01-14 10:51:56',
            ),
            327 =>
            array (
                'id' => 328,
                'procurement_item_id' => 328,
                'procurement_type' => 'SUPPLIES',
                'price' => '5500.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:52:14',
                'updated_at' => '2021-01-14 10:52:14',
            ),
            328 =>
            array (
                'id' => 329,
                'procurement_item_id' => 329,
                'procurement_type' => 'SUPPLIES',
                'price' => '1382.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:52:56',
                'updated_at' => '2021-01-14 10:52:56',
            ),
            329 =>
            array (
                'id' => 330,
                'procurement_item_id' => 330,
                'procurement_type' => 'SUPPLIES',
                'price' => '59.23',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:53:38',
                'updated_at' => '2021-01-14 10:53:38',
            ),
            330 =>
            array (
                'id' => 331,
                'procurement_item_id' => 331,
                'procurement_type' => 'SUPPLIES',
                'price' => '1116.00',
                'effective_date' => '2021-01-13',
                'created_at' => '2021-01-14 10:53:58',
                'updated_at' => '2021-01-14 10:53:58',
            ),
            331 =>
            array (
                'id' => 332,
                'procurement_item_id' => 332,
                'procurement_type' => 'SUPPLIES',
                'price' => '15859.92',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:19:55',
                'updated_at' => '2021-02-03 14:20:03',
            ),
            332 =>
            array (
                'id' => 333,
                'procurement_item_id' => 333,
                'procurement_type' => 'SUPPLIES',
                'price' => '16924.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:20:41',
                'updated_at' => '2021-02-03 14:26:05',
            ),
            333 =>
            array (
                'id' => 334,
                'procurement_item_id' => 334,
                'procurement_type' => 'SUPPLIES',
                'price' => '17932.15',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:21:08',
                'updated_at' => '2021-02-03 14:26:45',
            ),
            334 =>
            array (
                'id' => 335,
                'procurement_item_id' => 335,
                'procurement_type' => 'SUPPLIES',
                'price' => '19041.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:21:35',
                'updated_at' => '2021-02-03 14:27:29',
            ),
            335 =>
            array (
                'id' => 336,
                'procurement_item_id' => 336,
                'procurement_type' => 'SUPPLIES',
                'price' => '20229.80',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:22:10',
                'updated_at' => '2021-02-03 14:28:23',
            ),
            336 =>
            array (
                'id' => 337,
                'procurement_item_id' => 337,
                'procurement_type' => 'SUPPLIES',
                'price' => '21458.25',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:22:58',
                'updated_at' => '2021-02-03 14:28:50',
            ),
            337 =>
            array (
                'id' => 338,
                'procurement_item_id' => 338,
                'procurement_type' => 'SUPPLIES',
                'price' => '22709.28',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:23:28',
                'updated_at' => '2021-02-03 14:29:17',
            ),
            338 =>
            array (
                'id' => 339,
                'procurement_item_id' => 339,
                'procurement_type' => 'SUPPLIES',
                'price' => '24162.96',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:23:52',
                'updated_at' => '2021-02-03 14:29:41',
            ),
            339 =>
            array (
                'id' => 340,
                'procurement_item_id' => 340,
                'procurement_type' => 'SUPPLIES',
                'price' => '25854.99',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:24:16',
                'updated_at' => '2021-02-03 14:30:15',
            ),
            340 =>
            array (
                'id' => 341,
                'procurement_item_id' => 341,
                'procurement_type' => 'SUPPLIES',
                'price' => '27937.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:24:44',
                'updated_at' => '2021-02-03 14:31:06',
            ),
            341 =>
            array (
                'id' => 342,
                'procurement_item_id' => 342,
                'procurement_type' => 'SUPPLIES',
                'price' => '31231.35',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:25:11',
                'updated_at' => '2021-02-03 14:32:08',
            ),
            342 =>
            array (
                'id' => 343,
                'procurement_item_id' => 343,
                'procurement_type' => 'SUPPLIES',
                'price' => '33912.95',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:25:38',
                'updated_at' => '2021-02-03 14:32:54',
            ),
            343 =>
            array (
                'id' => 344,
                'procurement_item_id' => 344,
                'procurement_type' => 'SUPPLIES',
                'price' => '36654.95',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:26:02',
                'updated_at' => '2021-02-03 14:33:25',
            ),
            344 =>
            array (
                'id' => 345,
                'procurement_item_id' => 345,
                'procurement_type' => 'SUPPLIES',
                'price' => '39765.60',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:26:28',
                'updated_at' => '2021-02-03 14:34:20',
            ),
            345 =>
            array (
                'id' => 346,
                'procurement_item_id' => 346,
                'procurement_type' => 'SUPPLIES',
                'price' => '43188.18',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:26:56',
                'updated_at' => '2021-02-03 14:34:53',
            ),
            346 =>
            array (
                'id' => 347,
                'procurement_item_id' => 347,
                'procurement_type' => 'SUPPLIES',
                'price' => '46952.27',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:27:20',
                'updated_at' => '2021-02-03 14:35:23',
            ),
            347 =>
            array (
                'id' => 348,
                'procurement_item_id' => 348,
                'procurement_type' => 'SUPPLIES',
                'price' => '51092.41',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:27:47',
                'updated_at' => '2021-02-03 14:35:55',
            ),
            348 =>
            array (
                'id' => 349,
                'procurement_item_id' => 349,
                'procurement_type' => 'SUPPLIES',
                'price' => '55648.03',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:28:10',
                'updated_at' => '2021-02-03 14:38:56',
            ),
            349 =>
            array (
                'id' => 350,
                'procurement_item_id' => 350,
                'procurement_type' => 'SUPPLIES',
                'price' => '61358.90',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:31:06',
                'updated_at' => '2021-02-03 14:39:29',
            ),
            350 =>
            array (
                'id' => 351,
                'procurement_item_id' => 351,
                'procurement_type' => 'SUPPLIES',
                'price' => '68679.96',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:31:36',
                'updated_at' => '2021-02-03 14:40:21',
            ),
            351 =>
            array (
                'id' => 352,
                'procurement_item_id' => 352,
                'procurement_type' => 'SUPPLIES',
                'price' => '76878.86',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:32:00',
                'updated_at' => '2021-02-03 14:41:00',
            ),
            352 =>
            array (
                'id' => 353,
                'procurement_item_id' => 353,
                'procurement_type' => 'SUPPLIES',
                'price' => '86142.99',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:32:25',
                'updated_at' => '2021-02-03 14:41:39',
            ),
            353 =>
            array (
                'id' => 354,
                'procurement_item_id' => 354,
                'procurement_type' => 'SUPPLIES',
                'price' => '96612.92',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:32:49',
                'updated_at' => '2021-02-03 14:42:18',
            ),
            354 =>
            array (
                'id' => 355,
                'procurement_item_id' => 355,
                'procurement_type' => 'SUPPLIES',
                'price' => '108738.66',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:33:16',
                'updated_at' => '2021-02-03 14:42:57',
            ),
            355 =>
            array (
                'id' => 356,
                'procurement_item_id' => 356,
                'procurement_type' => 'SUPPLIES',
                'price' => '123711.20',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:33:47',
                'updated_at' => '2021-02-03 14:43:47',
            ),
            356 =>
            array (
                'id' => 357,
                'procurement_item_id' => 357,
                'procurement_type' => 'SUPPLIES',
                'price' => '139561.57',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:34:09',
                'updated_at' => '2021-02-03 14:44:22',
            ),
            357 =>
            array (
                'id' => 358,
                'procurement_item_id' => 358,
                'procurement_type' => 'SUPPLIES',
                'price' => '157469.69',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-14 13:34:40',
                'updated_at' => '2021-02-03 14:44:46',
            ),
            358 =>
            array (
                'id' => 359,
                'procurement_item_id' => 1,
                'procurement_type' => 'DRUM',
                'price' => '1.32',
                'effective_date' => '2021-01-19',
                'created_at' => '2021-01-19 16:50:59',
                'updated_at' => '2021-01-26 13:42:40',
            ),
            359 =>
            array (
                'id' => 360,
                'procurement_item_id' => 2,
                'procurement_type' => 'DRUM',
                'price' => '20.84',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-19 16:54:55',
                'updated_at' => '2021-01-19 16:54:55',
            ),
            360 =>
            array (
                'id' => 361,
                'procurement_item_id' => 359,
                'procurement_type' => 'SUPPLIES',
                'price' => '150.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-25 11:25:17',
                'updated_at' => '2021-01-25 11:25:17',
            ),
            361 =>
            array (
                'id' => 362,
                'procurement_item_id' => 360,
                'procurement_type' => 'SUPPLIES',
                'price' => '100.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-25 11:25:52',
                'updated_at' => '2021-01-25 11:25:52',
            ),
            362 =>
            array (
                'id' => 363,
                'procurement_item_id' => 361,
                'procurement_type' => 'SUPPLIES',
                'price' => '100.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-25 11:26:31',
                'updated_at' => '2021-01-25 11:26:31',
            ),
            363 =>
            array (
                'id' => 364,
                'procurement_item_id' => 362,
                'procurement_type' => 'SUPPLIES',
                'price' => '300.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-25 11:26:53',
                'updated_at' => '2021-01-25 11:26:53',
            ),
            364 =>
            array (
                'id' => 365,
                'procurement_item_id' => 363,
                'procurement_type' => 'SUPPLIES',
                'price' => '300.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-25 11:27:09',
                'updated_at' => '2021-01-25 11:27:09',
            ),
            365 =>
            array (
                'id' => 366,
                'procurement_item_id' => 364,
                'procurement_type' => 'SUPPLIES',
                'price' => '650.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-25 11:27:38',
                'updated_at' => '2021-01-25 11:27:38',
            ),
            366 =>
            array (
                'id' => 367,
                'procurement_item_id' => 3,
                'procurement_type' => 'DRUM',
                'price' => '25.30',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-25 14:31:08',
                'updated_at' => '2021-01-25 14:31:08',
            ),
            367 =>
            array (
                'id' => 368,
                'procurement_item_id' => 4,
                'procurement_type' => 'DRUM',
                'price' => '17.88',
                'effective_date' => '2021-01-25',
                'created_at' => '2021-01-25 15:10:34',
                'updated_at' => '2021-01-26 13:48:24',
            ),
            368 =>
            array (
                'id' => 369,
                'procurement_item_id' => 5,
                'procurement_type' => 'DRUM',
                'price' => '2.27',
                'effective_date' => '2021-01-25',
                'created_at' => '2021-01-25 15:23:33',
                'updated_at' => '2021-01-26 13:50:12',
            ),
            369 =>
            array (
                'id' => 370,
                'procurement_item_id' => 6,
                'procurement_type' => 'DRUM',
                'price' => '1.39',
                'effective_date' => '2021-01-25',
                'created_at' => '2021-01-25 15:25:30',
                'updated_at' => '2021-01-26 13:51:00',
            ),
            370 =>
            array (
                'id' => 371,
                'procurement_item_id' => 7,
                'procurement_type' => 'DRUM',
                'price' => '2.78',
                'effective_date' => '2021-01-25',
                'created_at' => '2021-01-25 16:12:15',
                'updated_at' => '2021-01-26 13:51:53',
            ),
            371 =>
            array (
                'id' => 372,
                'procurement_item_id' => 8,
                'procurement_type' => 'DRUM',
                'price' => '8.71',
                'effective_date' => '2021-01-25',
                'created_at' => '2021-01-25 20:23:24',
                'updated_at' => '2021-01-26 13:53:43',
            ),
            372 =>
            array (
                'id' => 373,
                'procurement_item_id' => 9,
                'procurement_type' => 'DRUM',
                'price' => '150.54',
                'effective_date' => '2021-02-01',
                'created_at' => '2021-01-25 22:23:40',
                'updated_at' => '2021-01-26 13:55:28',
            ),
            373 =>
            array (
                'id' => 374,
                'procurement_item_id' => 9,
                'procurement_type' => 'DRUM',
                'price' => '150.00',
                'effective_date' => '2020-01-01',
                'created_at' => '2021-01-25 22:26:02',
                'updated_at' => '2021-01-25 22:26:02',
            ),
            374 =>
            array (
                'id' => 375,
                'procurement_item_id' => 10,
                'procurement_type' => 'DRUM',
                'price' => '4.62',
                'effective_date' => '2021-09-01',
                'created_at' => '2021-01-25 22:29:17',
                'updated_at' => '2021-01-26 13:56:22',
            ),
            375 =>
            array (
                'id' => 376,
                'procurement_item_id' => 10,
                'procurement_type' => 'DRUM',
                'price' => '150.00',
                'effective_date' => '2020-01-25',
                'created_at' => '2021-01-25 22:31:52',
                'updated_at' => '2021-01-25 22:31:52',
            ),
            376 =>
            array (
                'id' => 377,
                'procurement_item_id' => 11,
                'procurement_type' => 'DRUM',
                'price' => '85.91',
                'effective_date' => '2021-01-09',
                'created_at' => '2021-01-26 13:57:28',
                'updated_at' => '2021-01-26 13:57:28',
            ),
            377 =>
            array (
                'id' => 378,
                'procurement_item_id' => 12,
                'procurement_type' => 'DRUM',
                'price' => '4.84',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 13:59:55',
                'updated_at' => '2021-01-26 13:59:55',
            ),
            378 =>
            array (
                'id' => 379,
                'procurement_item_id' => 13,
                'procurement_type' => 'DRUM',
                'price' => '2.90',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:00:41',
                'updated_at' => '2021-01-26 14:00:41',
            ),
            379 =>
            array (
                'id' => 380,
                'procurement_item_id' => 14,
                'procurement_type' => 'DRUM',
                'price' => '82.50',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:01:52',
                'updated_at' => '2021-01-26 14:01:52',
            ),
            380 =>
            array (
                'id' => 381,
                'procurement_item_id' => 15,
                'procurement_type' => 'DRUM',
                'price' => '12.74',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:02:30',
                'updated_at' => '2021-01-26 14:02:30',
            ),
            381 =>
            array (
                'id' => 382,
                'procurement_item_id' => 16,
                'procurement_type' => 'DRUM',
                'price' => '5.34',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:04:01',
                'updated_at' => '2021-01-26 14:04:01',
            ),
            382 =>
            array (
                'id' => 383,
                'procurement_item_id' => 17,
                'procurement_type' => 'DRUM',
                'price' => '16.25',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:09:30',
                'updated_at' => '2021-01-26 14:09:30',
            ),
            383 =>
            array (
                'id' => 384,
                'procurement_item_id' => 18,
                'procurement_type' => 'DRUM',
                'price' => '15.40',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:10:07',
                'updated_at' => '2021-01-26 14:10:07',
            ),
            384 =>
            array (
                'id' => 385,
                'procurement_item_id' => 19,
                'procurement_type' => 'DRUM',
                'price' => '0.68',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:10:44',
                'updated_at' => '2021-01-26 14:10:44',
            ),
            385 =>
            array (
                'id' => 386,
                'procurement_item_id' => 20,
                'procurement_type' => 'DRUM',
                'price' => '1.69',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:14:21',
                'updated_at' => '2021-01-26 14:14:21',
            ),
            386 =>
            array (
                'id' => 387,
                'procurement_item_id' => 21,
                'procurement_type' => 'DRUM',
                'price' => '20.74',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:15:06',
                'updated_at' => '2021-01-26 14:15:06',
            ),
            387 =>
            array (
                'id' => 388,
                'procurement_item_id' => 22,
                'procurement_type' => 'DRUM',
                'price' => '27.17',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:16:27',
                'updated_at' => '2021-01-26 14:16:27',
            ),
            388 =>
            array (
                'id' => 389,
                'procurement_item_id' => 23,
                'procurement_type' => 'DRUM',
                'price' => '1.32',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:18:12',
                'updated_at' => '2021-01-26 14:18:12',
            ),
            389 =>
            array (
                'id' => 390,
                'procurement_item_id' => 24,
                'procurement_type' => 'DRUM',
                'price' => '18.74',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:18:41',
                'updated_at' => '2021-01-26 14:18:41',
            ),
            390 =>
            array (
                'id' => 391,
                'procurement_item_id' => 25,
                'procurement_type' => 'DRUM',
                'price' => '19.42',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:19:14',
                'updated_at' => '2021-01-26 14:19:14',
            ),
            391 =>
            array (
                'id' => 392,
                'procurement_item_id' => 26,
                'procurement_type' => 'DRUM',
                'price' => '1.21',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:19:51',
                'updated_at' => '2021-01-26 14:19:51',
            ),
            392 =>
            array (
                'id' => 393,
                'procurement_item_id' => 27,
                'procurement_type' => 'DRUM',
                'price' => '0.97',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:22:26',
                'updated_at' => '2021-01-26 14:22:26',
            ),
            393 =>
            array (
                'id' => 394,
                'procurement_item_id' => 28,
                'procurement_type' => 'DRUM',
                'price' => '0.62',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:23:11',
                'updated_at' => '2021-01-26 14:23:11',
            ),
            394 =>
            array (
                'id' => 395,
                'procurement_item_id' => 29,
                'procurement_type' => 'DRUM',
                'price' => '0.61',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:24:02',
                'updated_at' => '2021-01-26 14:24:02',
            ),
            395 =>
            array (
                'id' => 396,
                'procurement_item_id' => 30,
                'procurement_type' => 'DRUM',
                'price' => '13.17',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:24:44',
                'updated_at' => '2021-01-26 14:24:44',
            ),
            396 =>
            array (
                'id' => 397,
                'procurement_item_id' => 31,
                'procurement_type' => 'DRUM',
                'price' => '14.17',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:25:19',
                'updated_at' => '2021-01-26 14:25:19',
            ),
            397 =>
            array (
                'id' => 398,
                'procurement_item_id' => 32,
                'procurement_type' => 'DRUM',
                'price' => '0.25',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:25:47',
                'updated_at' => '2021-01-26 14:25:47',
            ),
            398 =>
            array (
                'id' => 399,
                'procurement_item_id' => 33,
                'procurement_type' => 'DRUM',
                'price' => '30.79',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:26:42',
                'updated_at' => '2021-01-26 14:26:42',
            ),
            399 =>
            array (
                'id' => 400,
                'procurement_item_id' => 34,
                'procurement_type' => 'DRUM',
                'price' => '1.38',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:27:38',
                'updated_at' => '2021-01-26 14:27:38',
            ),
            400 =>
            array (
                'id' => 401,
                'procurement_item_id' => 35,
                'procurement_type' => 'DRUM',
                'price' => '10.12',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:28:15',
                'updated_at' => '2021-01-26 14:28:15',
            ),
            401 =>
            array (
                'id' => 402,
                'procurement_item_id' => 36,
                'procurement_type' => 'DRUM',
                'price' => '13.86',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:28:49',
                'updated_at' => '2021-01-26 14:28:49',
            ),
            402 =>
            array (
                'id' => 403,
                'procurement_item_id' => 37,
                'procurement_type' => 'DRUM',
                'price' => '0.41',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:29:24',
                'updated_at' => '2021-01-26 14:29:24',
            ),
            403 =>
            array (
                'id' => 404,
                'procurement_item_id' => 38,
                'procurement_type' => 'DRUM',
                'price' => '7.61',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:30:07',
                'updated_at' => '2021-01-26 14:30:07',
            ),
            404 =>
            array (
                'id' => 405,
                'procurement_item_id' => 39,
                'procurement_type' => 'DRUM',
                'price' => '25.77',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:31:12',
                'updated_at' => '2021-01-26 14:31:12',
            ),
            405 =>
            array (
                'id' => 406,
                'procurement_item_id' => 40,
                'procurement_type' => 'DRUM',
                'price' => '2.19',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:31:51',
                'updated_at' => '2021-01-26 14:31:51',
            ),
            406 =>
            array (
                'id' => 407,
                'procurement_item_id' => 41,
                'procurement_type' => 'DRUM',
                'price' => '5.50',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:32:21',
                'updated_at' => '2021-01-26 14:32:21',
            ),
            407 =>
            array (
                'id' => 408,
                'procurement_item_id' => 42,
                'procurement_type' => 'DRUM',
                'price' => '0.79',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:33:06',
                'updated_at' => '2021-01-26 14:33:06',
            ),
            408 =>
            array (
                'id' => 409,
                'procurement_item_id' => 43,
                'procurement_type' => 'DRUM',
                'price' => '0.54',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:33:46',
                'updated_at' => '2021-01-26 14:33:46',
            ),
            409 =>
            array (
                'id' => 410,
                'procurement_item_id' => 44,
                'procurement_type' => 'DRUM',
                'price' => '2.37',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:34:19',
                'updated_at' => '2021-01-26 14:34:19',
            ),
            410 =>
            array (
                'id' => 411,
                'procurement_item_id' => 45,
                'procurement_type' => 'DRUM',
                'price' => '0.90',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:34:46',
                'updated_at' => '2021-01-26 14:34:46',
            ),
            411 =>
            array (
                'id' => 412,
                'procurement_item_id' => 46,
                'procurement_type' => 'DRUM',
                'price' => '1.10',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:35:14',
                'updated_at' => '2021-01-26 14:35:14',
            ),
            412 =>
            array (
                'id' => 413,
                'procurement_item_id' => 47,
                'procurement_type' => 'DRUM',
                'price' => '1.60',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:35:40',
                'updated_at' => '2021-01-26 14:35:40',
            ),
            413 =>
            array (
                'id' => 414,
                'procurement_item_id' => 48,
                'procurement_type' => 'DRUM',
                'price' => '0.91',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:36:09',
                'updated_at' => '2021-01-26 14:36:09',
            ),
            414 =>
            array (
                'id' => 415,
                'procurement_item_id' => 49,
                'procurement_type' => 'DRUM',
                'price' => '48.66',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:37:09',
                'updated_at' => '2021-01-26 14:37:09',
            ),
            415 =>
            array (
                'id' => 416,
                'procurement_item_id' => 50,
                'procurement_type' => 'DRUM',
                'price' => '49.50',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:37:46',
                'updated_at' => '2021-01-26 14:37:46',
            ),
            416 =>
            array (
                'id' => 417,
                'procurement_item_id' => 51,
                'procurement_type' => 'DRUM',
                'price' => '48.95',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:38:21',
                'updated_at' => '2021-01-26 14:38:21',
            ),
            417 =>
            array (
                'id' => 418,
                'procurement_item_id' => 52,
                'procurement_type' => 'DRUM',
                'price' => '962.50',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:38:54',
                'updated_at' => '2021-01-26 14:38:54',
            ),
            418 =>
            array (
                'id' => 419,
                'procurement_item_id' => 53,
                'procurement_type' => 'DRUM',
                'price' => '77.55',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:39:39',
                'updated_at' => '2021-01-26 14:39:39',
            ),
            419 =>
            array (
                'id' => 420,
                'procurement_item_id' => 54,
                'procurement_type' => 'DRUM',
                'price' => '660.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-26 14:40:27',
                'updated_at' => '2021-01-26 14:40:27',
            ),
            420 =>
            array (
                'id' => 421,
                'procurement_item_id' => 365,
                'procurement_type' => 'SUPPLIES',
                'price' => '400.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-28 16:47:51',
                'updated_at' => '2021-01-28 16:47:51',
            ),
            421 =>
            array (
                'id' => 422,
                'procurement_item_id' => 366,
                'procurement_type' => 'SUPPLIES',
                'price' => '1000.00',
                'effective_date' => '2021-01-01',
                'created_at' => '2021-01-29 16:05:39',
                'updated_at' => '2021-02-04 14:15:40',
            ),
            422 =>
            array (
                'id' => 423,
                'procurement_item_id' => 367,
                'procurement_type' => 'SUPPLIES',
                'price' => '1500.00',
                'effective_date' => '2021-02-01',
                'created_at' => '2021-02-03 14:49:22',
                'updated_at' => '2021-02-03 14:49:22',
            ),
            423 =>
            array (
                'id' => 424,
                'procurement_item_id' => 368,
                'procurement_type' => 'SUPPLIES',
                'price' => '1000.00',
                'effective_date' => '2021-02-01',
                'created_at' => '2021-02-03 14:50:39',
                'updated_at' => '2021-02-03 14:50:39',
            ),
            424 =>
            array (
                'id' => 425,
                'procurement_item_id' => 369,
                'procurement_type' => 'SUPPLIES',
                'price' => '150.00',
                'effective_date' => '2021-02-01',
                'created_at' => '2021-02-03 14:51:22',
                'updated_at' => '2021-02-03 14:51:22',
            ),
            425 =>
            array (
                'id' => 426,
                'procurement_item_id' => 370,
                'procurement_type' => 'SUPPLIES',
                'price' => '27.96',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-02-03 15:37:06',
                'updated_at' => '2021-02-03 15:37:06',
            ),
            426 =>
            array (
                'id' => 427,
                'procurement_item_id' => 371,
                'procurement_type' => 'SUPPLIES',
                'price' => '134.68',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-02-03 15:38:27',
                'updated_at' => '2021-02-03 15:38:27',
            ),
            427 =>
            array (
                'id' => 428,
                'procurement_item_id' => 372,
                'procurement_type' => 'SUPPLIES',
                'price' => '387.92',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-02-03 15:47:29',
                'updated_at' => '2021-02-03 15:47:29',
            ),
            428 =>
            array (
                'id' => 429,
                'procurement_item_id' => 373,
                'procurement_type' => 'SUPPLIES',
                'price' => '96.20',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-02-03 15:49:32',
                'updated_at' => '2021-02-03 15:49:32',
            ),
            429 =>
            array (
                'id' => 430,
                'procurement_item_id' => 374,
                'procurement_type' => 'SUPPLIES',
                'price' => '14.82',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-02-03 15:51:01',
                'updated_at' => '2021-02-03 15:51:01',
            ),
            430 =>
            array (
                'id' => 431,
                'procurement_item_id' => 375,
                'procurement_type' => 'SUPPLIES',
                'price' => '136.24',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-02-03 15:51:44',
                'updated_at' => '2021-02-03 15:51:44',
            ),
            431 =>
            array (
                'id' => 432,
                'procurement_item_id' => 376,
                'procurement_type' => 'SUPPLIES',
                'price' => '18.20',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-02-03 15:52:18',
                'updated_at' => '2021-02-03 15:52:18',
            ),
            432 =>
            array (
                'id' => 433,
                'procurement_item_id' => 377,
                'procurement_type' => 'SUPPLIES',
                'price' => '41.60',
                'effective_date' => '2021-02-03',
                'created_at' => '2021-02-03 15:56:54',
                'updated_at' => '2021-02-03 15:56:54',
            ),
        ));
    }
}
