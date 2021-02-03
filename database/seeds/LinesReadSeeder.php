<?php

use Illuminate\Database\Seeder;

class LinesReadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lines =[
    		["user_id"=>'1',"line_id"=>'1',"transaction_id"=>1,'created_at'=>"2021-01-25 00:00:00"],
            ["user_id"=>'5',"line_id"=>'1',"transaction_id"=>2,'created_at'=>"2021-01-28 00:00:00"],
            ["user_id"=>'1',"line_id"=>'3',"transaction_id"=>4,'created_at'=>"2021-02-03 00:00:00"]
    		];

    	foreach($lines as $line){
    		DB::table('lines_read')->insert([
	            'line_id' => $line['line_id'],
                'user_id' => $line['user_id'],
                'transaction_id'=>$line['transaction_id'],
                'created_at'=>$line['created_at']
	        ]);	
    	}
    }
}
