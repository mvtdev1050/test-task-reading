<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users =[
    		["name"=>'John','username'=>'john','email'=>'john@mailaintor.com','gender'=>'male','dob'=>"1994-02-03","role"=>2,'created_at'=>'2020-11-06 00:00:00','family'=>2],
    		["name"=>'Smith','username'=>'smith','email'=>'smith@mailaintor.com','gender'=>'male','dob'=>"1980-02-03","role"=>2,'created_at'=>'2020-10-04 00:00:00','family'=>2],
    		["name"=>'Karan','username'=>'karan','email'=>'karan@mailaintor.com','gender'=>'male','dob'=>"1990-05-04","role"=>1,'created_at'=>'2020-10-02 00:00:00','family'=>2],
    		["name"=>'Preet','username'=>'preet','email'=>'preet@mailaintor.com','gender'=>'female','dob'=>"1996-09-09","role"=>2,'created_at'=>'2020-08-11 00:00:00','family'=>2],
    		["name"=>'Rani','username'=>'rani','email'=>'rani@mailaintor.com','gender'=>'female','dob'=>"1994-07-03","role"=>'2','created_at'=>'2020-06-21 00:00:00',
            'family'=>2]
    		];

    	foreach($users as $user){
                     
    		DB::table('users')->insert([
	            'name' => $user['name'],
	            'email' => $user['email'],
	            'password' => Hash::make('12345678'),
	            'username'=>$user['username'],
	            'gender'=>$user['gender'],
	            'dob'=>$user['dob'],
	            'role'=>$user['role'],
                'family'=>$user['family'],
                'created_at'=>$user['created_at']

	        ]);	
    	}
        

    }
}
