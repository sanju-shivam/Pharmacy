<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 12; $i++) {

            Blog::insert([
                
                'title' => 'Title for the blog' . $i,
                'slug' => 'title-for-the-blog' . $i,
                'cover_image' => 'blogimage.jpeg',
                'body' => 'Lorem'.$i .'ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, nihil libero incidunt consequuntur laboriosam, illo odit culpa esse totam, nobis deleniti veniam! Maxime eligendi dignissimos quis modi officia sequi possimus.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, nihil libero incidunt consequuntur laboriosam, illo odit culpa esse totam, nobis deleniti veniam! Maxime eligendi dignissimos quis modi officia sequi possimus.',
                'user_id' => '1',

            ]);

            

        }
    }
}
