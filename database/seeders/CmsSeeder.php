<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		DB::table('cms')->insert([
			[
				'section_name' => 'about_section',
				'about_heading' => 'About Me Dynamic',
				'about_short_description' => 'This is what I do. Dynamic',
				'about_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?

				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!

				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora! Dynamic',
				'contact_heading' => null,
				'contact_short_description' => null,
				'contact_description' => null,
				'Twitter' => null,
				'Facebook' => null,
				'Instagram' => null,
			],
			[
				'section_name' => 'contact_section',
				'contact_heading' => 'Contact Me Dynamic',
				'contact_short_description' => 'Have questions? I have answers. Dynamic',
				'contact_description' => 'Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible! Dynamic',
				'about_heading' => null,
				'about_short_description' => null,
				'about_description' => null,
				'Twitter' => null,
				'Facebook' => null,
				'Instagram' => null,
			],
			[
				'section_name' => 'footer_section',
				'Twitter' => 'https://www.twitter.com',
				'Facebook' => 'https://www.facebook.com',
				'Instagram' => 'https://www.instagram.com',
				'contact_heading' => null,
				'contact_short_description' => null,
				'contact_description' => null,
				'about_heading' => null,
				'about_short_description' => null,
				'about_description' => null,
			],
		]);
			/*$section = [ // MultiDimentional Array
			[
				'section_name' => 'about_section',
				'about_heading' => 'About Me Dynamic',
				'about_short_description' => 'This is what I do. Dynamic',
				'about_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?

				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!

				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora! Dynamic',
				'contact_heading' => null,
				'contact_short_description' => null,
				'contact_description' => null,
				'Twitter' => null,
				'Facebook' => null,
				'Instagram' => null,
			],
			[
				'section_name' => 'contact_section',
				'contact_heading' => 'Contact Me Dynamic',
				'contact_short_description' => 'Have questions? I have answers. Dynamic',
				'contact_description' => 'Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible! Dynamic',
				'contact_heading' => null,
				'contact_short_description' => null,
				'contact_description' => null,
				'Twitter' => null,
				'Facebook' => null,
				'Instagram' => null,
			],
			[
				'section_name' => 'footer_section',
				'Twitter' => 'https://www.twitter.com',
				'Facebook' => 'https://www.facebook.com',
				'Instagram' => 'https://www.instagram.com',
				'contact_heading' => null,
				'contact_short_description' => null,
				'contact_description' => null,
				'Twitter' => null,
				'Facebook' => null,
				'Instagram' => null,
			],
		];
		
		foreach($section as $sectionn){
			Cms::create($sectionn);
		}*/
	}
}
