<?php

use Illuminate\Database\Seeder;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([

            ['name' => 'PCD Pharma Frenchise',
            'slug' => 'pcd-pharma-frechise'],

            ['name' => 'Third Party Manufacturing',
            'slug' => 'third-party-manufacturing'],

            ['name' => 'Cosmetic Derma Frenchise',
            'slug' => 'conmetic-derma-frenchise'],

            ['name' => 'Ayurvedic PCD Frenchise',
            'slug' => 'ayurvedic-pcd-frenchise'],

            ['name' => 'Cardiac Diabetic Munufacturing',
            'slug' => 'cardiac-diabetic-manufacturing'],

            ['name' => 'Allopathic Drug Manufacturing',
            'slug' => 'allopathic-drug-manufacturing'],

            ['name' => 'ENT Medicine Manufacturing',
            'slug' => 'ent-medicine-manufacturing'],

            ['name' => 'Pediatric Range Manufacturing',
            'slug' => 'pediatric-range-manufacturing'],

            ['name' => 'Manufacturing Fecilities',
            'slug' => 'manufacturing-fecilities'],

            ['name' => 'Business Opportunities',
            'slug' => 'business-opportunities'],

            ['name' => 'Ayurvedic Herbal Manufacturing',
            'slug' => 'ayurvedic-herbal-manufacturing'],

            ['name' => 'Nutraceutical Range',
            'slug' => 'nutraceutical-range'],
            
        ]);
    }
}
