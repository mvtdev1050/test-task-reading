<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles =[
    		["role"=>'admin'],
    		["role"=>'user']
    		];

    	foreach($roles as $role){
    		DB::table('roles')->insert([
	            'role' => $role['role'],

	        ]);	
    	}
    }
}
