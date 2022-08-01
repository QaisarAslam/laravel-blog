<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	/*{
		DB::table('Categories')->insert([
	   [
		 "name" => "Programming",
		 "created_at" => "2021-01-03 16:31:56",
		 "updated_at" => "2021-08-21 11:19:45",
	   ],
	   [
		 "name" => "Sports",
		 "created_at" => "2021-06-17 21:24:36",
		 "updated_at" => "2020-11-18 04:59:31",
	   ],
	   [
		 "name" => "Technology",
		 "created_at" => "2020-09-19 01:10:44",
		 "updated_at" => "2021-04-19 21:30:14",
	   ],
	   [
		 "name" => "Health",
		 "created_at" => "2021-04-13 07:51:50",
		 "updated_at" => "2021-07-03 17:11:16",
	   ],
	   [
		 "name" => "Ckn9h8oBrn",
		 "created_at" => "2020-08-31 14:11:55",
		 "updated_at" => "2020-08-04 09:23:58",
	   ],
	   [
		 "name" => "6mhYMoVPYK",
		 "created_at" => "2020-10-31 21:56:22",
		 "updated_at" => "2021-04-19 07:42:53",
	   ],
	   [
		 "name" => "QgboyxG9Sn",
		 "created_at" => "2021-04-28 20:51:17",
		 "updated_at" => "2021-06-29 18:31:01",
	   ],
	   [
		 "name" => "CnOBp3iPhW",
		 "created_at" => "2021-05-04 03:13:00",
		 "updated_at" => "2021-05-30 09:23:14",
	   ],
	   [
		 "name" => "QL7jXoXyzp",
		 "created_at" => "2020-10-15 00:00:51",
		 "updated_at" => "2021-03-31 01:22:08",
	   ],
	   [
		 "name" => "TLShvDAZ3B",
		 "created_at" => "2020-10-02 19:08:46",
		 "updated_at" => "2020-08-18 07:49:29",
	   ],
	   [
		 "name" => "0Ia3KlYHu7",
		 "created_at" => "2021-05-23 11:39:36",
		 "updated_at" => "2020-09-08 01:49:41",
	   ],
	   [
		 "name" => "S0P56dloj9",
		 "created_at" => "2021-08-10 21:59:30",
		 "updated_at" => "2020-09-08 05:27:29",
	   ],
	   [
		 "name" => "XmwTkbrx0F",
		 "created_at" => "2021-02-17 03:56:48",
		 "updated_at" => "2021-06-02 23:39:44",
	   ],
	   [
		 "name" => "AbyXiMz4Xx",
		 "created_at" => "2020-10-03 14:46:45",
		 "updated_at" => "2021-02-17 03:41:35",
	   ],
	   [
		 "name" => "D4Ft8lrxxB",
		 "created_at" => "2021-01-12 02:24:45",
		 "updated_at" => "2021-04-29 16:16:17",
	   ],
	   [
		 "name" => "w302Lz7mQV",
		 "created_at" => "2020-10-27 10:00:55",
		 "updated_at" => "2021-07-23 00:27:27",
	   ],
	   [
		 "name" => "TPbtpRAzP3",
		 "created_at" => "2021-08-17 15:14:10",
		 "updated_at" => "2021-03-12 04:41:19",
	   ],
	   [
		 "name" => "URzrXKdatd",
		 "created_at" => "2020-09-11 08:05:25",
		 "updated_at" => "2021-06-28 05:33:34",
	   ],
	   [
		 "name" => "kgZz73j227",
		 "created_at" => "2020-10-03 02:12:24",
		 "updated_at" => "2020-10-25 11:47:37",
	   ],
	   [
		 "name" => "xcaDSpm4bo",
		 "created_at" => "2021-06-06 00:11:23",
		 "updated_at" => "2021-06-19 01:03:20",
	   ],
	   [
		 "name" => "khhb8r5hcG",
		 "created_at" => "2021-07-18 17:23:07",
		 "updated_at" => "2021-08-10 03:07:06",
	   ],
	   [
		 "name" => "axW4hFq8Gu",
		 "created_at" => "2021-07-11 21:43:19",
		 "updated_at" => "2020-10-25 05:18:07",
	   ],
	   [
		 "name" => "qbPvvEA2g8",
		 "created_at" => "2020-09-08 20:01:00",
		 "updated_at" => "2021-06-15 03:49:01",
	   ],
	   [
		 "name" => "G5a0fKxk9U",
		 "created_at" => "2021-01-14 00:27:10",
		 "updated_at" => "2020-12-17 10:49:38",
	   ],
	   [
		 "name" => "PWZIr3f1ux",
		 "created_at" => "2021-07-06 15:28:05",
		 "updated_at" => "2020-10-05 09:29:54",
	   ],
	   [
		 "name" => "k5241GDhvC",
		 "created_at" => "2020-09-27 19:30:07",
		 "updated_at" => "2021-03-10 06:15:41",
	   ],
	   [
		 "name" => "6Hk7YP11M5",
		 "created_at" => "2020-10-26 20:02:59",
		 "updated_at" => "2020-11-06 22:35:29",
	   ],
	   [
		 "name" => "xcnRppyM9E",
		 "created_at" => "2021-03-07 22:48:23",
		 "updated_at" => "2021-02-12 23:43:55",
	   ],
	   [
		 "name" => "rmBrUC7jgO",
		 "created_at" => "2020-12-11 03:31:14",
		 "updated_at" => "2021-08-07 19:01:07",
	   ],
	   [
		 "name" => "9jiCVdWAtT",
		 "created_at" => "2021-08-19 10:26:07",
		 "updated_at" => "2021-01-05 18:40:41",
	   ],
	   [
		 "name" => "eJH2gyoxyN",
		 "created_at" => "2021-05-31 11:54:56",
		 "updated_at" => "2021-06-14 09:04:01",
	   ],
	   [
		 "name" => "vpFABiEHxK",
		 "created_at" => "2020-08-29 07:01:56",
		 "updated_at" => "2021-03-19 16:41:40",
	   ],
	   [
		 "name" => "9qH7rlXBJa",
		 "created_at" => "2021-05-12 11:49:46",
		 "updated_at" => "2021-08-15 16:37:50",
	   ],
	   [
		 "name" => "7hnbxrS7Gb",
		 "created_at" => "2021-04-22 23:02:54",
		 "updated_at" => "2021-06-04 18:14:07",
	   ],
	   [
		 "name" => "A7TvaosFlr",
		 "created_at" => "2020-12-27 12:12:59",
		 "updated_at" => "2021-06-06 13:17:39",
	   ],
	   [
		 "name" => "A5x5Gq8yfd",
		 "created_at" => "2021-05-04 15:32:58",
		 "updated_at" => "2021-08-17 16:54:22",
	   ],
	   [
		 "name" => "lW3JCa8xXP",
		 "created_at" => "2021-06-03 16:14:13",
		 "updated_at" => "2021-02-11 23:56:55",
	   ],
	   [
		 "name" => "qLO0l1AtS9",
		 "created_at" => "2021-06-05 11:21:46",
		 "updated_at" => "2020-11-14 01:25:59",
	   ],
	   [
		 "name" => "fdGoZHOcPD",
		 "created_at" => "2021-03-18 13:39:13",
		 "updated_at" => "2021-07-16 18:05:20",
	   ],
	   [
		 "name" => "ocWI3Cot8P",
		 "created_at" => "2021-06-26 22:00:19",
		 "updated_at" => "2020-10-21 10:38:27",
	   ],
	   [
		 "name" => "GrKKFYjwbw",
		 "created_at" => "2020-08-16 22:55:11",
		 "updated_at" => "2020-09-22 22:28:33",
	   ],
	   [
		 "name" => "1ZAJqXNcpY",
		 "created_at" => "2021-06-06 18:09:35",
		 "updated_at" => "2021-04-25 07:23:57",
	   ],
	   [
		 "name" => "woj75gqREC",
		 "created_at" => "2021-01-18 01:36:11",
		 "updated_at" => "2021-05-26 22:08:56",
	   ],
	   [
		 "name" => "yXXmeHVA7x",
		 "created_at" => "2020-08-22 03:17:04",
		 "updated_at" => "2020-12-13 07:08:08",
	   ],
	   [
		 "name" => "90vlhYLT6N",
		 "created_at" => "2021-01-29 17:14:28",
		 "updated_at" => "2020-10-15 03:40:31",
	   ],
	   [
		 "name" => "dgc5dv5RVQ",
		 "created_at" => "2020-11-11 22:55:00",
		 "updated_at" => "2020-12-24 11:31:23",
	   ],
	   [
		 "name" => "dV9248EK1G",
		 "created_at" => "2021-02-18 05:20:06",
		 "updated_at" => "2020-10-13 13:17:07",
	   ],
	   [
		 "name" => "0IlHJRcOSa",
		 "created_at" => "2020-08-30 02:40:14",
		 "updated_at" => "2021-05-25 23:33:29",
	   ],
	   [
		 "name" => "6FGQ6VPdzL",
		 "created_at" => "2020-12-02 12:41:09",
		 "updated_at" => "2020-11-03 16:06:38",
	   ],
	   [
		 "name" => "xHsUIQWjCd",
		 "created_at" => "2021-05-29 20:36:02",
		 "updated_at" => "2021-01-19 02:38:57",
	   ],
	   [
		 "name" => "AuiZ1JYoAI",
		 "created_at" => "2020-09-09 22:00:24",
		 "updated_at" => "2021-06-20 19:21:46",
	   ],
	   [
		 "name" => "bXtqP2UJOO",
		 "created_at" => "2020-09-18 06:54:19",
		 "updated_at" => "2020-10-30 01:42:45",
	   ],
	   [
		 "name" => "Ff0FjPZbHU",
		 "created_at" => "2021-04-23 00:40:59",
		 "updated_at" => "2021-06-10 03:32:24",
	   ],
	   [
		 "name" => "hLuHS1ci5X",
		 "created_at" => "2020-11-15 22:59:05",
		 "updated_at" => "2021-01-30 22:02:43",
	   ],
	   [
		 "name" => "gYsiuuteEw",
		 "created_at" => "2021-04-17 02:28:58",
		 "updated_at" => "2021-04-20 16:46:06",
	   ],
	   [
		 "name" => "rNkInEZoUJ",
		 "created_at" => "2020-08-07 08:17:34",
		 "updated_at" => "2020-12-08 10:08:30",
	   ],
	   [
		 "name" => "BLanYILrCx",
		 "created_at" => "2021-07-02 03:35:05",
		 "updated_at" => "2020-12-21 15:32:19",
	   ],
	   [
		 "name" => "S5e07TA1eP",
		 "created_at" => "2020-12-03 20:14:20",
		 "updated_at" => "2021-04-24 19:40:21",
	   ],
	   [
		 "name" => "OezuAKkdYR",
		 "created_at" => "2021-02-22 21:43:46",
		 "updated_at" => "2020-11-20 01:42:34",
	   ],
	   [
		 "name" => "NZV9AbkTmx",
		 "created_at" => "2021-03-08 01:27:58",
		 "updated_at" => "2021-06-20 18:49:33",
	   ],
	   [
		 "name" => "uzXLUl40Q4",
		 "created_at" => "2020-11-18 01:28:06",
		 "updated_at" => "2021-08-10 19:46:41",
	   ],
	   [
		 "name" => "v6o8D4vZlt",
		 "created_at" => "2020-12-08 00:50:59",
		 "updated_at" => "2021-02-17 08:14:58",
	   ],
	   [
		 "name" => "jXGrBqfK31",
		 "created_at" => "2021-07-18 01:31:39",
		 "updated_at" => "2021-03-18 01:47:54",
	   ],
	   [
		 "name" => "fLsPJhCL9n",
		 "created_at" => "2021-06-15 14:48:31",
		 "updated_at" => "2021-03-13 18:39:52",
	   ],
	   [
		 "name" => "SvugdxpnhR",
		 "created_at" => "2021-01-19 10:31:14",
		 "updated_at" => "2020-12-13 00:50:25",
	   ],
	   [
		 "name" => "etNWuOEMRq",
		 "created_at" => "2020-12-19 22:20:14",
		 "updated_at" => "2021-02-01 23:45:49",
	   ],
	   [
		 "name" => "zRfyuiLK4K",
		 "created_at" => "2021-02-12 21:55:13",
		 "updated_at" => "2021-01-12 02:19:07",
	   ],
	   [
		 "name" => "7pJh7nKWB6",
		 "created_at" => "2021-05-20 19:22:00",
		 "updated_at" => "2020-10-02 15:05:11",
	   ],
	   [
		 "name" => "do032rz27o",
		 "created_at" => "2021-08-23 11:36:19",
		 "updated_at" => "2021-07-16 03:54:46",
	   ],
	   [
		 "name" => "y8PtbHjAkR",
		 "created_at" => "2021-02-27 20:52:22",
		 "updated_at" => "2021-06-08 03:54:43",
	   ],
	   [
		 "name" => "6A19qbRgoO",
		 "created_at" => "2021-02-15 21:27:08",
		 "updated_at" => "2020-08-24 10:15:14",
	   ],
	   [
		 "name" => "3U3I4uNBOG",
		 "created_at" => "2021-04-08 07:50:31",
		 "updated_at" => "2021-08-11 00:44:22",
	   ],
	   [
		 "name" => "SXgMNkvY1o",
		 "created_at" => "2021-04-12 04:02:03",
		 "updated_at" => "2021-02-05 23:35:34",
	   ],
	   [
		 "name" => "dRnXLlfG6V",
		 "created_at" => "2020-08-04 11:22:59",
		 "updated_at" => "2021-03-08 03:52:21",
	   ],
	   [
		 "name" => "sCnp0DniOz",
		 "created_at" => "2021-06-11 18:04:21",
		 "updated_at" => "2021-04-02 00:32:19",
	   ],
	   [
		 "name" => "NvAT4KfVzf",
		 "created_at" => "2021-05-31 01:44:41",
		 "updated_at" => "2021-06-24 10:33:05",
	   ],
	   [
		 "name" => "TTxpY2Udw8",
		 "created_at" => "2020-08-21 13:35:45",
		 "updated_at" => "2020-09-21 19:41:23",
	   ],
	   [
		 "name" => "ws0ChvfvMl",
		 "created_at" => "2021-07-21 18:44:02",
		 "updated_at" => "2021-03-13 22:23:08",
	   ],
	   [
		 "name" => "INKNTsPFUu",
		 "created_at" => "2021-04-29 08:58:02",
		 "updated_at" => "2021-02-06 00:37:11",
	   ],
	   [
		 "name" => "RfXIQnAf9C",
		 "created_at" => "2021-05-14 01:50:39",
		 "updated_at" => "2020-08-14 20:20:53",
	   ],
	   [
		 "name" => "hBWP2N9fQp",
		 "created_at" => "2020-08-02 00:22:50",
		 "updated_at" => "2021-04-16 16:30:19",
	   ],
	   [
		 "name" => "KXkcehhtvj",
		 "created_at" => "2020-09-24 03:46:54",
		 "updated_at" => "2020-08-07 23:46:23",
	   ],
	   [
		 "name" => "n3SsORU3Sc",
		 "created_at" => "2021-03-17 08:05:22",
		 "updated_at" => "2021-08-05 08:22:37",
	   ],
	   [
		 "name" => "ApZRIhPCyk",
		 "created_at" => "2020-10-10 19:35:14",
		 "updated_at" => "2021-08-07 18:00:23",
	   ],
	   [
		 "name" => "Gct5gb0n2j",
		 "created_at" => "2021-06-14 20:28:28",
		 "updated_at" => "2021-08-03 18:21:58",
	   ],
	   [
		 "name" => "Uz2zm1JwEP",
		 "created_at" => "2020-10-01 05:24:42",
		 "updated_at" => "2021-04-22 21:21:01",
	   ],
	   [
		 "name" => "bTFm8hAGj9",
		 "created_at" => "2021-03-12 15:28:27",
		 "updated_at" => "2020-12-30 17:48:52",
	   ],
	   [
		 "name" => "uNiAMBj8t8",
		 "created_at" => "2021-05-24 12:48:26",
		 "updated_at" => "2021-01-18 04:33:21",
	   ],
	   [
		 "name" => "lIOZ9VJpkL",
		 "created_at" => "2021-02-28 13:17:51",
		 "updated_at" => "2021-01-02 02:19:22",
	   ],
	   [
		 "name" => "VHSmSmdhwe",
		 "created_at" => "2021-06-15 15:12:03",
		 "updated_at" => "2020-10-21 01:28:20",
	   ],
	   [
		 "name" => "N4U9DaXNuo",
		 "created_at" => "2020-11-09 20:58:54",
		 "updated_at" => "2020-08-31 16:47:32",
	   ],
	   [
		 "name" => "YwvDzHCCZC",
		 "created_at" => "2021-07-24 17:23:04",
		 "updated_at" => "2021-06-04 18:58:31",
	   ],
	   [
		 "name" => "ChKaWREuaC",
		 "created_at" => "2020-11-14 06:20:29",
		 "updated_at" => "2020-10-11 02:09:48",
	   ],
	   [
		 "name" => "SaG0SQSSzH",
		 "created_at" => "2020-12-01 01:00:59",
		 "updated_at" => "2021-08-15 10:24:12",
	   ],
	   [
		 "name" => "Rz1G5Ad6KZ",
		 "created_at" => "2020-08-19 08:46:21",
		 "updated_at" => "2021-05-13 03:54:00",
	   ],
	   [
		 "name" => "Yr2y6XVIuL",
		 "created_at" => "2020-10-27 20:44:05",
		 "updated_at" => "2021-06-27 02:39:21",
	   ],
	   [
		 "name" => "COPn7yEpI2",
		 "created_at" => "2021-03-11 15:09:30",
		 "updated_at" => "2021-05-26 15:17:57",
	   ],
	   [
		 "name" => "ng75wNtPyY",
		 "created_at" => "2020-11-16 08:06:41",
		 "updated_at" => "2021-08-22 02:13:08",
	   ],
	   [
		 "name" => "e7fXq1sA8v",
		 "created_at" => "2020-08-04 14:22:07",
		 "updated_at" => "2021-07-27 23:55:27",
	   ],
	   [
		 "name" => "5BV6WMsLep",
		 "created_at" => "2021-01-19 08:05:42",
		 "updated_at" => "2021-06-28 10:21:54",
	   ],
		]);
	}*/
	{
		DB::table('Categories')->insert([
			[
				"name" => 'Sports',
				"created_at" => "2020-08-31 14:11:55",
				"updated_at" => "2020-08-04 09:23:58",
			],
			[
				'name' => 'Health',
				"created_at" => "2021-01-03 16:31:56",
				"updated_at" => "2021-08-21 11:19:45",
			],
			[
				'name' =>  'Technology',
				"created_at" => "2021-06-17 21:24:36",
				"updated_at" => "2020-11-18 04:59:31",
			],
			[
				'name' =>  'Education',
				"created_at" => "2020-09-19 01:10:44",
				"updated_at" => "2021-04-19 21:30:14",
			],
			[
				'name' => 'Motivational',
				"created_at" => "2021-04-13 07:51:50",
				"updated_at" => "2021-07-03 17:11:16",
			],
			[
				'name' => 'Soccer.',
				"created_at" => "2021-08-10 21:59:30",
				"updated_at" => "2020-09-08 05:27:29",
			],
			[
				'name' => 'Baseball',
				"created_at" => "2021-05-23 11:39:36",
				"updated_at" => "2020-09-08 01:49:41",
			],
			[
				'name' => 'Designer',
				"created_at" => "2020-10-02 19:08:46",
				"updated_at" => "2020-08-18 07:49:29",
			],
			[
				'name' => 'Motivational',
				"created_at" => "2020-10-15 00:00:51",
				"updated_at" => "2021-03-31 01:22:08",
			],
			[
				'name' => 'Motivational',
				"created_at" => "2021-05-04 03:13:00",
				"updated_at" => "2021-05-30 09:23:14",
			],
		]);
	}
}
