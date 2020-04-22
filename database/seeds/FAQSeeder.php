<?php

use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faq = [
            "Is this app free?" => 'Yes, this app is free but there are in-app purchases',
            "How do long does it take a driver to get to my location" => "This depends on how far you are from our station & the number of pending orders",
            "Do you accept cash on delivery" => "Not at the moment, but youre only charged when the trip is completed"
        ];
        foreach($faq as $q => $a){
            DB::table('faqs')->insert([
                'question' => $q,
                'answer' => $a,
            ]);
        }
    }
}
