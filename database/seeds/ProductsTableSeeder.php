<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Brand;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {

            Product::create([
                
                'title' => 'Product' . $i,
                'slug' => 'product' . $i,
                'molecules' => 'product' . $i,
                'image' => 'productimage.jpeg',
                'text' => 'Lorem'.$i .'ipsum dolor sit amet consectetur adipisicing elit. Enim, iure consectetur adipisicing elit. Enim, iure!',
                'brand_id' => '1',
                'category_id' => '1',
                'state_id' => '1',

            ]);


        }

        for ($i = 1; $i < 9; $i++) {

            Product::create([
                
                'title' => 'Product Two' . $i,
                'slug' => 'product-two' . $i,
                'molecules' => 'product-two' . $i,
                'image' => 'productimage.jpeg',
                'text' => 'Lorem'.$i .'ipsum dolor sit amet consectetur adipisicing elit. Enim, iure consectetur adipisicing elit. Enim, iure!',
                'brand_id' => '2',
                'category_id' => '2',
                'state_id' => '3',

            ]);

        }

        for ($i = 1; $i < 8; $i++) {

            Product::create([
                
                'title' => 'Product-2' . $i,
                'slug' => 'product-2' . $i,
                'molecules' => 'product-2' . $i,
                'image' => 'productimage.jpeg',
                'text' => 'Lorem'.$i .'ipsum dolor sit amet consectetur adipisicing elit. Enim, iure consectetur adipisicing elit. Enim, iure!',
                'brand_id' => '3',
                'category_id' => '3',
                'state_id' => '17',

            ]);

        }

        for ($i = 1; $i < 10; $i++) {

            Product::create([
                
                'title' => 'Product-3' . $i,
                'slug' => 'product-3' . $i,
                'molecules' => 'product-3' . $i,
                'image' => 'productimage.jpeg',
                'text' => 'Lorem'.$i .'ipsum dolor sit amet consectetur adipisicing elit. Enim, iure consectetur adipisicing elit. Enim, iure!',
                'brand_id' => '4',
                'category_id' => '4',
                'state_id' => '19',

            ]);

        }

        for ($i = 1; $i < 7; $i++) {

            Product::create([
                
                'title' => 'Product-4' . $i,
                'slug' => 'product-4' . $i,
                'molecules' => 'product-4' . $i,
                'image' => 'productimage.jpeg',
                'text' => 'Lorem'.$i .'ipsum dolor sit amet consectetur adipisicing elit. Enim, iure consectetur adipisicing elit. Enim, iure!',
                'brand_id' => '5',
                'category_id' => '5',
                'state_id' => '13',
            ]);

        }

        for ($i = 1; $i < 5; $i++) {

            Product::create([
                
                'title' => 'Product-5' . $i,
                'slug' => 'product-5' . $i,
                'molecules' => 'product-5' . $i,
                'image' => 'productimage.jpeg',
                'text' => 'Lorem'.$i .'ipsum dolor sit amet consectetur adipisicing elit. Enim, iure consectetur adipisicing elit. Enim, iure!',
                'brand_id' => '6',
                'category_id' => '6',
                'state_id' => '11',

            ]);

        }

        for ($i = 1; $i < 2; $i++) {

            Product::create([
                
                'title' => 'Product-6' . $i,
                'slug' => 'product-6' . $i,
                'molecules' => 'product-6' . $i,
                'image' => 'productimage.jpeg',
                'text' => 'Lorem'.$i .'ipsum dolor sit amet consectetur adipisicing elit. Enim, iure consectetur adipisicing elit. Enim, iure!',
                'brand_id' => '7',
                'category_id' => '7',
                'state_id' => '4',

            ]);
        }
        
    }
}
