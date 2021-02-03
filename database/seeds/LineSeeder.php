<?php

use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lines =[
    		["user_id"=>1,"lines"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","lines_number"=>"2","lines_book_name"=>"Loreum","lines_book_chapter"=>"Loreumm chapter 1","created_at"=>'2021-01-06 00:00:00'],
    		["user_id"=>5,"lines"=>"We will use appropriate physical, technical and administrative safeguards to protect your data.  Access to your personal data will be restricted to only those who need to know that information and required to perform their job function.  In addition, we train our employees about the importance of maintaining the confidentiality and security of your information.","lines_number"=>"3","lines_book_name"=>"Privacy Policy","lines_book_chapter"=>"Privacy chapter 1","created_at"=>'2021-01-06 00:00:00'],
    		["user_id"=>1,"lines"=>"Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app. Having a Terms and Conditions agreement is completely optional. No laws require you to have one. Not even the super-strict and wide-reaching General Data Protection Regulation (GDPR).","lines_number"=>"3","lines_book_name"=>"Terms","lines_book_chapter"=>"Terms of site","created_at"=>'2021-01-06 00:00:00'],
    		["user_id"=>5,"lines"=>"Economics is a social science concerned with the production, distribution, and consumption of goods and services. It studies how individuals, businesses, governments, and nations make choices about how to allocate resources. Economics focuses on the actions of human beings, based on assumptions that humans act with rational behavior, seeking the most optimal level of benefit or utility. The building blocks of economics are the studies of labor and trade.","lines_number"=>"4","lines_book_name"=>"Econimics","lines_book_chapter"=>"Basics of ECO","created_at"=>'2021-01-06 00:00:00'],
    		["user_id"=>1,"lines"=>"New to stock market? I will take you through the world of share market in this article. Firstly, let us learn what is share market? Share market is where buying and selling of share happens. Share represents a unit of ownership of the company from where you bought it.","lines_number"=>5,"lines_book_name"=>"Share Market","lines_book_chapter"=>"Basics of share market","created_at"=>'2021-01-06 00:00:00'],
    		
    		];

    	foreach($lines as $line){
    		DB::table('lines')->insert([
	            'user_id' => $line['user_id'],
	            'lines' => $line['lines'],
	            'lines_number' => $line['lines_number'],
	            'lines_book_name' => $line['lines_book_name'],
	            'lines_book_chapter' => $line['lines_book_chapter'],
                'created_at'=>$line['created_at']

	        ]);	
    	}
    }
}
