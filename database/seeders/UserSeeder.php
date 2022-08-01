<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // https://www.itsolutionstuff.com/post/laravel-7-database-seeder-exampleexample.html
        // User::create can't create more than one record using array
        // User::create([
        // DB can insert more than one record using array
        DB::table('users')->insert([
        	[
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'), // 12345678
            ],
            [
        	    'name' => 'Qaisar',
        	    'email' => 'qaisar@gmail.com',
        	    'password' => bcrypt('12345678'), // 12345678
        	],
        	[
        	    'name' => 'Qaisar74',
        	    'email' => 'qaisar74@gmail.com',
        	    'password' => bcrypt('11221122'), // 11221122
        	],
        	[
        	    'name' => 'Faisal',
        	    'email' => 'faisal@gmail.com',
        	    'password' => bcrypt('12345678'), // 12345678
        	],
        	[
        	    'name' => 'Faisal74',
        	    'email' => 'faisal74@gmail.com',
        	    'password' => bcrypt('11221122'), // 11221122
        	],
        	[
        	    'name' => 'Saif',
        	    'email' => 'saif@gmail.com',
        	    'password' => bcrypt('12345678'), // 12345678
        	],
        	[
        	    'name' => 'Saif74',
        	    'email' => 'saif74@gmail.com',
        	    'password' => bcrypt('11221122'), // 11221122
        	],
    	]);
    	// Ep_41(01:50)
    	/*$user = User::create([
    		'name' => 'Touseef',
    		'email' => 'allaboutlaravel@gmail.com',
    		'password' => bcrypt('11221122'),
    	]);
    	$user->roles()->attach(1);*/ // Admin
    	// If we have more than one Admin
    	/*$admins = [ // MultiDimentional Array
    		[
	    		'name' => 'Admin User',
	    		'email' => 'admin@gamil.com',
	    		'password' => bcrypt('12345678'),
	    	],
	    	[
	    		'name' => 'Super Admin',
	    		'email' => 'super@gmail.com',
	    		'password' => bcrypt('11221122'),
	    	],
    	];
    	foreach($admins as $admin){
    		$adminUser = User::create($admin);
    		$adminUser->roles()->attach(1);
    	}*/
    }
}
