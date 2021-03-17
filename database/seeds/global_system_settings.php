<?php

use Illuminate\Database\Seeder;
use App\GlobalSystemSettings;
class global_system_settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    \DB::table('global_system_settings')->delete();

    \DB::table('global_system_settings')->insert(array (
            0 =>
            array (
                'id' => 1,
                'user_id' => 2,
                'select_year' => '5',
                'select_program_id' => 'null',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 11:18:47',
                'updated_at' => '2021-02-10 08:43:45',
            ),
            1 =>
            array (
                'id' => 2,
                'user_id' => 3,
                'select_year' => '6',
                'select_program_id' => '40',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 11:50:34',
                'updated_at' => '2021-01-27 14:56:32',
            ),
            2 =>
            array (
                'id' => 3,
                'user_id' => 4,
                'select_year' => '6',
                'select_program_id' => '44',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 11:50:47',
                'updated_at' => '2021-02-11 08:43:51',
            ),
            3 =>
            array (
                'id' => 4,
                'user_id' => 5,
                'select_year' => '6',
                'select_program_id' => '42',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 12:02:25',
                'updated_at' => '2021-02-10 11:02:49',
            ),
            4 =>
            array (
                'id' => 5,
                'user_id' => 7,
                'select_year' => '6',
                'select_program_id' => '9',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 12:40:27',
                'updated_at' => '2021-02-09 11:07:01',
            ),
            5 =>
            array (
                'id' => 6,
                'user_id' => 8,
                'select_year' => '6',
                'select_program_id' => '1',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 12:50:34',
                'updated_at' => '2021-02-09 10:53:18',
            ),
            6 =>
            array (
                'id' => 7,
                'user_id' => 9,
                'select_year' => '6',
                'select_program_id' => '2',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 13:16:21',
                'updated_at' => '2021-02-10 11:42:43',
            ),
            7 =>
            array (
                'id' => 8,
                'user_id' => 10,
                'select_year' => '6',
                'select_program_id' => '45',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 13:19:20',
                'updated_at' => '2021-02-11 09:15:50',
            ),
            8 =>
            array (
                'id' => 9,
                'user_id' => 11,
                'select_year' => '6',
                'select_program_id' => '15',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 14:35:24',
                'updated_at' => '2021-02-10 12:02:04',
            ),
            9 =>
            array (
                'id' => 10,
                'user_id' => 12,
                'select_year' => '6',
                'select_program_id' => '16',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 14:35:39',
                'updated_at' => '2021-02-10 12:02:12',
            ),
            10 =>
            array (
                'id' => 11,
                'user_id' => 13,
                'select_year' => '6',
                'select_program_id' => '14',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 14:43:59',
                'updated_at' => '2021-02-10 12:22:17',
            ),
            11 =>
            array (
                'id' => 12,
                'user_id' => 14,
                'select_year' => '6',
                'select_program_id' => '55',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 14:46:23',
                'updated_at' => '2021-02-09 11:25:23',
            ),
            12 =>
            array (
                'id' => 14,
                'user_id' => 16,
                'select_year' => '6',
                'select_program_id' => '39',
                'sms_notification' => NULL,
                'created_at' => '2021-01-11 15:40:29',
                'updated_at' => '2021-02-11 09:25:18',
            ),
            13 =>
            array (
                'id' => 15,
                'user_id' => 17,
                'select_year' => '6',
                'select_program_id' => '49',
                'sms_notification' => NULL,
                'created_at' => '2021-01-12 08:27:42',
                'updated_at' => '2021-02-11 09:01:48',
            ),
            14 =>
            array (
                'id' => 16,
                'user_id' => 18,
                'select_year' => '6',
                'select_program_id' => '7',
                'sms_notification' => NULL,
                'created_at' => '2021-01-12 13:16:06',
                'updated_at' => '2021-02-10 13:47:34',
            ),
            15 =>
            array (
                'id' => 17,
                'user_id' => 19,
                'select_year' => '6',
                'select_program_id' => '26',
                'sms_notification' => NULL,
                'created_at' => '2021-01-12 14:38:45',
                'updated_at' => '2021-01-12 14:48:37',
            ),
            16 =>
            array (
                'id' => 18,
                'user_id' => 20,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-01-12 15:01:42',
                'updated_at' => '2021-01-12 15:01:42',
            ),
            17 =>
            array (
                'id' => 19,
                'user_id' => 1,
                'select_year' => '6',
                'select_program_id' => 'null',
                'sms_notification' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-02-17 00:04:16',
            ),
            18 =>
            array (
                'id' => 20,
                'user_id' => 21,
                'select_year' => '6',
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 09:24:18',
                'updated_at' => '2021-01-13 12:56:14',
            ),
            19 =>
            array (
                'id' => 21,
                'user_id' => 22,
                'select_year' => '6',
                'select_program_id' => '47',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 10:59:44',
                'updated_at' => '2021-02-11 09:23:55',
            ),
            20 =>
            array (
                'id' => 22,
                'user_id' => 23,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 15:30:23',
                'updated_at' => '2021-01-13 15:30:23',
            ),
            21 =>
            array (
                'id' => 23,
                'user_id' => 24,
                'select_year' => '6',
                'select_program_id' => 'null',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 15:34:55',
                'updated_at' => '2021-01-25 22:28:37',
            ),
            22 =>
            array (
                'id' => 24,
                'user_id' => 25,
                'select_year' => '6',
                'select_program_id' => '48',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 15:38:09',
                'updated_at' => '2021-02-11 09:22:17',
            ),
            23 =>
            array (
                'id' => 25,
                'user_id' => 26,
                'select_year' => '6',
                'select_program_id' => '3',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 15:40:46',
                'updated_at' => '2021-02-10 09:16:11',
            ),
            24 =>
            array (
                'id' => 26,
                'user_id' => 27,
                'select_year' => '6',
                'select_program_id' => 'null',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 15:43:21',
                'updated_at' => '2021-01-27 14:34:04',
            ),
            25 =>
            array (
                'id' => 27,
                'user_id' => 28,
                'select_year' => '6',
                'select_program_id' => '30',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 15:47:50',
                'updated_at' => '2021-02-09 14:43:57',
            ),
            26 =>
            array (
                'id' => 28,
                'user_id' => 29,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 15:52:54',
                'updated_at' => '2021-01-13 15:52:54',
            ),
            27 =>
            array (
                'id' => 29,
                'user_id' => 30,
                'select_year' => '6',
                'select_program_id' => '32',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 15:53:38',
                'updated_at' => '2021-02-11 13:22:41',
            ),
            28 =>
            array (
                'id' => 30,
                'user_id' => 31,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 15:59:27',
                'updated_at' => '2021-01-13 15:59:27',
            ),
            29 =>
            array (
                'id' => 31,
                'user_id' => 32,
                'select_year' => '6',
                'select_program_id' => '19',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 16:05:59',
                'updated_at' => '2021-02-10 09:33:03',
            ),
            30 =>
            array (
                'id' => 32,
                'user_id' => 33,
                'select_year' => '6',
                'select_program_id' => '25',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 16:07:09',
                'updated_at' => '2021-02-09 16:03:02',
            ),
            31 =>
            array (
                'id' => 33,
                'user_id' => 34,
                'select_year' => '6',
                'select_program_id' => '21',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 16:08:38',
                'updated_at' => '2021-02-09 13:55:34',
            ),
            32 =>
            array (
                'id' => 34,
                'user_id' => 35,
                'select_year' => '6',
                'select_program_id' => '22',
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 16:10:14',
                'updated_at' => '2021-02-11 13:24:50',
            ),
            33 =>
            array (
                'id' => 35,
                'user_id' => 36,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-01-13 16:13:52',
                'updated_at' => '2021-01-13 16:13:52',
            ),
            34 =>
            array (
                'id' => 36,
                'user_id' => 37,
                'select_year' => '6',
                'select_program_id' => 'null',
                'sms_notification' => NULL,
                'created_at' => '2021-01-14 13:55:06',
                'updated_at' => '2021-02-09 15:08:41',
            ),
            35 =>
            array (
                'id' => 37,
                'user_id' => 38,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-01-14 14:25:47',
                'updated_at' => '2021-01-14 14:25:47',
            ),
            36 =>
            array (
                'id' => 38,
                'user_id' => 39,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-01-14 14:38:38',
                'updated_at' => '2021-01-14 14:38:38',
            ),
            37 =>
            array (
                'id' => 39,
                'user_id' => 40,
                'select_year' => '6',
                'select_program_id' => '28',
                'sms_notification' => NULL,
                'created_at' => '2021-01-15 13:38:38',
                'updated_at' => '2021-02-13 12:58:37',
            ),
            38 =>
            array (
                'id' => 40,
                'user_id' => 41,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-01-19 14:57:51',
                'updated_at' => '2021-01-19 14:57:51',
            ),
            39 =>
            array (
                'id' => 41,
                'user_id' => 42,
                'select_year' => '6',
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-01-20 09:24:07',
                'updated_at' => '2021-01-20 09:27:19',
            ),
            40 =>
            array (
                'id' => 42,
                'user_id' => 43,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-02-03 09:47:02',
                'updated_at' => '2021-02-03 09:47:02',
            ),
            41 =>
            array (
                'id' => 43,
                'user_id' => 44,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-02-09 10:46:00',
                'updated_at' => '2021-02-09 10:46:00',
            ),
            42 =>
            array (
                'id' => 44,
                'user_id' => 45,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-02-09 10:46:56',
                'updated_at' => '2021-02-09 10:46:56',
            ),
            43 =>
            array (
                'id' => 45,
                'user_id' => 46,
                'select_year' => '6',
                'select_program_id' => '12',
                'sms_notification' => NULL,
                'created_at' => '2021-02-09 11:09:06',
                'updated_at' => '2021-02-10 13:49:23',
            ),
            44 =>
            array (
                'id' => 46,
                'user_id' => 47,
                'select_year' => '6',
                'select_program_id' => '8',
                'sms_notification' => NULL,
                'created_at' => '2021-02-09 11:12:53',
                'updated_at' => '2021-02-10 14:58:50',
            ),
            45 =>
            array (
                'id' => 47,
                'user_id' => 48,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-02-09 11:46:22',
                'updated_at' => '2021-02-09 11:46:22',
            ),
            46 =>
            array (
                'id' => 48,
                'user_id' => 49,
                'select_year' => '6',
                'select_program_id' => '10',
                'sms_notification' => NULL,
                'created_at' => '2021-02-09 13:08:32',
                'updated_at' => '2021-02-10 14:58:07',
            ),
            47 =>
            array (
                'id' => 49,
                'user_id' => 50,
                'select_year' => '6',
                'select_program_id' => '34',
                'sms_notification' => NULL,
                'created_at' => '2021-02-09 14:46:39',
                'updated_at' => '2021-02-09 15:05:47',
            ),
            48 =>
            array (
                'id' => 50,
                'user_id' => 51,
                'select_year' => '6',
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-02-09 14:49:46',
                'updated_at' => '2021-02-09 15:03:23',
            ),
            49 =>
            array (
                'id' => 51,
                'user_id' => 52,
                'select_year' => '6',
                'select_program_id' => '31',
                'sms_notification' => NULL,
                'created_at' => '2021-02-09 14:50:03',
                'updated_at' => '2021-02-09 16:13:35',
            ),
            50 =>
            array (
                'id' => 52,
                'user_id' => 53,
                'select_year' => '6',
                'select_program_id' => '35',
                'sms_notification' => NULL,
                'created_at' => '2021-02-09 15:12:38',
                'updated_at' => '2021-02-09 15:14:28',
            ),
            51 =>
            array (
                'id' => 53,
                'user_id' => 54,
                'select_year' => '6',
                'select_program_id' => '13',
                'sms_notification' => NULL,
                'created_at' => '2021-02-10 09:16:49',
                'updated_at' => '2021-02-10 09:23:51',
            ),
            52 =>
            array (
                'id' => 54,
                'user_id' => 55,
                'select_year' => '6',
                'select_program_id' => 'null',
                'sms_notification' => NULL,
                'created_at' => '2021-02-10 10:01:43',
                'updated_at' => '2021-02-10 10:02:42',
            ),
            53 =>
            array (
                'id' => 55,
                'user_id' => 56,
                'select_year' => '6',
                'select_program_id' => '5',
                'sms_notification' => NULL,
                'created_at' => '2021-02-10 10:41:30',
                'updated_at' => '2021-02-10 16:48:51',
            ),
            54 =>
            array (
                'id' => 56,
                'user_id' => 57,
                'select_year' => '6',
                'select_program_id' => '56',
                'sms_notification' => NULL,
                'created_at' => '2021-02-10 11:32:42',
                'updated_at' => '2021-02-10 12:21:54',
            ),
            55 =>
            array (
                'id' => 57,
                'user_id' => 59,
                'select_year' => '6',
                'select_program_id' => '52',
                'sms_notification' => NULL,
                'created_at' => '2021-02-10 12:46:17',
                'updated_at' => '2021-02-10 13:20:41',
            ),
            56 =>
            array (
                'id' => 58,
                'user_id' => 60,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 09:20:15',
                'updated_at' => '2021-02-11 09:20:15',
            ),
            57 =>
            array (
                'id' => 59,
                'user_id' => 61,
                'select_year' => '6',
                'select_program_id' => '46',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:05:16',
                'updated_at' => '2021-02-11 13:32:25',
            ),
            58 =>
            array (
                'id' => 60,
                'user_id' => 62,
                'select_year' => '6',
                'select_program_id' => '61',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:19:03',
                'updated_at' => '2021-02-11 13:37:35',
            ),
            59 =>
            array (
                'id' => 61,
                'user_id' => 63,
                'select_year' => '6',
                'select_program_id' => '54',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:19:22',
                'updated_at' => '2021-02-11 13:28:51',
            ),
            60 =>
            array (
                'id' => 62,
                'user_id' => 64,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:23:32',
                'updated_at' => '2021-02-11 13:23:32',
            ),
            61 =>
            array (
                'id' => 63,
                'user_id' => 65,
                'select_year' => '6',
                'select_program_id' => '33',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:23:55',
                'updated_at' => '2021-02-11 13:30:35',
            ),
            62 =>
            array (
                'id' => 64,
                'user_id' => 66,
                'select_year' => '6',
                'select_program_id' => '62',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:25:14',
                'updated_at' => '2021-02-11 13:32:29',
            ),
            63 =>
            array (
                'id' => 65,
                'user_id' => 67,
                'select_year' => '6',
                'select_program_id' => '65',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:28:38',
                'updated_at' => '2021-02-11 13:30:21',
            ),
            64 =>
            array (
                'id' => 66,
                'user_id' => 68,
                'select_year' => '6',
                'select_program_id' => '66',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:29:21',
                'updated_at' => '2021-02-11 13:32:43',
            ),
            65 =>
            array (
                'id' => 67,
                'user_id' => 69,
                'select_year' => '6',
                'select_program_id' => '64',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:30:33',
                'updated_at' => '2021-02-11 13:33:12',
            ),
            66 =>
            array (
                'id' => 68,
                'user_id' => 70,
                'select_year' => NULL,
                'select_program_id' => NULL,
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:37:17',
                'updated_at' => '2021-02-11 13:37:17',
            ),
            67 =>
            array (
                'id' => 69,
                'user_id' => 71,
                'select_year' => '6',
                'select_program_id' => '63',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 13:39:10',
                'updated_at' => '2021-02-11 13:40:24',
            ),
            68 =>
            array (
                'id' => 70,
                'user_id' => 72,
                'select_year' => '6',
                'select_program_id' => '37',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 14:31:29',
                'updated_at' => '2021-02-11 15:00:36',
            ),
            69 =>
            array (
                'id' => 71,
                'user_id' => 73,
                'select_year' => '6',
                'select_program_id' => '34',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 14:43:31',
                'updated_at' => '2021-02-11 15:00:37',
            ),
            70 =>
            array (
                'id' => 72,
                'user_id' => 74,
                'select_year' => '6',
                'select_program_id' => '35',
                'sms_notification' => NULL,
                'created_at' => '2021-02-11 14:45:21',
                'updated_at' => '2021-02-11 14:58:06',
            ),
        ));
}
