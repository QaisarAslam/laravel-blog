<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('blogs')->insert([
			[
			'user_id' => '1',
			'category_id' => '1',
			'title' => '1st Blog 1st User',
			'url' => '1st Blog 1st User',
			'image' => '1st Blog 1st User',
			'image_alt' => '1st Blog 1st User',
			'meta' => '1st Blog 1st User',
			'short_description' => '1st Blog 1st User',
			'description' => '1st Blog 1st User',
			'active' => '1',
			],
			[
			'user_id' => '1',
			'category_id' => '1',
			'title' => '2nd Blog 1st User',
			'url' => '2nd Blog 1st User',
			'image' => '2nd Blog 1st User',
			'image_alt' => '2nd Blog 1st User',
			'meta' => '2nd Blog 1st User',
			'short_description' => '2nd Blog 1st User',
			'description' => '2nd Blog 1st User',
			'active' => '1',
			],
			[
			'user_id' => '2',
			'category_id' => '2',
			'title' => '1st Blog 2nd User',
			'url' => '1st Blog 2nd User',
			'image' => '1st Blog 2nd User',
			'image_alt' => '1st Blog 2nd User',
			'meta' => '1st Blog 2nd User',
			'short_description' => '1st Blog 2nd User',
			'description' => '1st Blog 2nd User',
			'active' => '1',
			],
			[
			'user_id' => '2',
			'category_id' => '2',
			'title' => '2nd Blog 2nd User',
			'url' => '2nd Blog 2nd User',
			'image' => '2nd Blog 2nd User',
			'image_alt' => '2nd Blog 2nd User',
			'meta' => '2nd Blog 2nd User',
			'short_description' => '2nd Blog 2nd User',
			'description' => '2nd Blog 2nd User',
			'active' => '1',
			],
		]);
	}
}
