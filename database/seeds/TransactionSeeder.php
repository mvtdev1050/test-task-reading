<?php

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	$txs =[
    		["user_id"=>'1','amount'=>"250",'type'=>'lines','created_at'=>'2021-02-02 00:00:00'],
    		["user_id"=>'5','amount'=>"20",'type'=>'lines','created_at'=>'2021-02-03 00:00:00'],
    		["user_id"=>'1','amount'=>"150",'type'=>'time','created_at'=>'2021-02-04 00:00:00'],
    		["user_id"=>'1','amount'=>"80",'type'=>'lines','created_at'=>'2021-02-04 00:00:00'],
            ["user_id"=>'5','amount'=>"35",'type'=>'time','created_at'=>'2021-02-05 00:00:00']
    		];

    	foreach($txs as $tx){
    		DB::table('transactions')->insert([
	            'user_id' => $tx['user_id'],
                'type'=>$tx['type'],
                'amount'=>$tx['amount'],
                'created_at'=>$tx['created_at']
	        ]);	
    	}
    }
}

