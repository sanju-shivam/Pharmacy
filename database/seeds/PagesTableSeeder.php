<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Page::insert([

            ['title' => 'About',
            'slug' => 'about',
            'keywords' => 'About Us Keywords for SEO',
            'description' => 'Page description here for SEO',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque tenetur ad soluta ratione, voluptatibus sit earum. Facere, nihil itaque, quasi ea magnam qui iste delectus, quod aperiam et beatae excepturi?'],

            ['title' => 'Contact',
            'slug' => 'contact',
            'keywords' => 'Contact Us Keywords for SEO',
            'description' => 'Page description here for SEO',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque tenetur ad soluta ratione, voluptatibus sit earum. Facere, nihil itaque, quasi ea magnam qui iste delectus, quod aperiam et beatae excepturi?'],
            
            ['title' => 'Cancellation',
            'slug' => 'cancellation',
            'keywords' => 'Cancellation Keywords for SEO',
            'description' => 'Page description here for SEO',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque tenetur ad soluta ratione, voluptatibus sit earum. Facere, nihil itaque, quasi ea magnam qui iste delectus, quod aperiam et beatae excepturi?'],

            ['title' => 'Terms and Conditions',
            'slug' => 'terms-and-conditions',
            'keywords' => 'Terms Keywords for SEO',
            'description' => 'Page description here for SEO',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque tenetur ad soluta ratione, voluptatibus sit earum. Facere, nihil itaque, quasi ea magnam qui iste delectus, quod aperiam et beatae excepturi?'],

            ['title' => 'Policy',
            'slug' => 'policy',
            'keywords' => 'Policy Keywords for SEO',
            'description' => 'Page description here for SEO',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque tenetur ad soluta ratione, voluptatibus sit earum. Facere, nihil itaque, quasi ea magnam qui iste delectus, quod aperiam et beatae excepturi?'],

            ['title' => 'Disclaimer',
            'slug' => 'disclaimer',
            'keywords' => 'Cancellation Keywords for SEO',
            'description' => 'Page description here for SEO',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque tenetur ad soluta ratione, voluptatibus sit earum. Facere, nihil itaque, quasi ea magnam qui iste delectus, quod aperiam et beatae excepturi?'],
            
        ]);
    }
}
