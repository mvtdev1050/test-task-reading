<?php

use Illuminate\Database\Seeder;

class TimesReadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $lines =[
    		["user_id"=>'1',"transaction_id"=>3,'amount'=>"20","created_at"=>"2021-02-04 00:00:00"],
    		["user_id"=>'5',"transaction_id"=>5,'amount'=>"10","created_at"=>"2021-02-06 00:00:00"]
    		];

    	foreach($lines as $line){
    		DB::table('times_read')->insert([
	            'user_id' => $line['user_id'],
                'transaction_id'=>$line['transaction_id'],
                'amount'=>$line['amount'],
                'created_at'=>$line['created_at']

	        ]);	
    	}
    }
}
