<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    /*{
    	DB::table('roles')->insert([
    			['name' => 'admin'],
    			['name' => 'basicUser'],
    		]);
    }*/

    	// Ep_40(04:22) Role Seeder in Urdu Episode 40
    {
    	$roles = ['Admin', 'Basic_User'];
    	foreach ($roles as $role) { // foreach due to multiple users
    		Role::create([
    			'name' => $role,
    		]);
    	}
    }
}
