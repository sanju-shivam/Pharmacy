<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::insert([

            ['name' => 'Himalya',
            'slug' => 'himalya'],

            ['name' => 'Cipla',
            'slug' => 'cipla'],

            ['name' => 'Hamdard',
            'slug' => 'hamdard'],

            ['name' => 'Patanjali',
            'slug' => 'patanjali'],

            ['name' => 'Ayurveda',
            'slug' => 'ayurveda'],

            ['name' => 'Yakult',
            'slug' => 'yakult'],

            ['name' => 'Brand',
            'slug' => 'brand'],
            
        ]);
    }
}
