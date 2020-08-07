<?php

use Illuminate\Database\Seeder;
use App\Social;

class SocialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social::insert([

            ['name' => 'Facebook',
            'icon' => 'fab fa-facebook',
            'link' => 'https://facebook.in',],

            ['name' => 'WhatsApp',
            'icon' => 'fab fa-whatsapp',
            'link' => 'https://web.whatsapp.com',],

            ['name' => 'Twiiter',
            'icon' => 'fab fa-twitter',
            'link' => 'https://www.twitter.com',],
                        
        ]);
    }
}
