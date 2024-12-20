<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticleImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('article_images')->delete();
        
        \DB::table('article_images')->insert(array (
            0 => 
            array (
                'id' => 6,
                'img_url' => 'articles/2/182cdd78-fb8e-4fbc-8977-d1f1379ccd2f.PNG',
                'article_id' => 2,
                'created_at' => '2024-12-19 23:56:28',
                'updated_at' => '2024-12-19 23:56:28',
            ),
            1 => 
            array (
                'id' => 7,
                'img_url' => 'articles/2/36f063a2-a1f5-4c8c-9df0-f2c2abc680ac.PNG',
                'article_id' => 2,
                'created_at' => '2024-12-19 23:56:28',
                'updated_at' => '2024-12-19 23:56:28',
            ),
            2 => 
            array (
                'id' => 8,
                'img_url' => 'articles/2/93140b83-9d37-4797-b7e0-dbb2642603dc.jpg',
                'article_id' => 2,
                'created_at' => '2024-12-19 23:56:28',
                'updated_at' => '2024-12-19 23:56:28',
            ),
            3 => 
            array (
                'id' => 9,
                'img_url' => 'articles/2/c839e36d-46c9-45a2-bb3e-c19d8923ea4b.jpg',
                'article_id' => 2,
                'created_at' => '2024-12-19 23:56:28',
                'updated_at' => '2024-12-19 23:56:28',
            ),
            4 => 
            array (
                'id' => 10,
                'img_url' => 'articles/2/9c74e2de-7458-4b79-9057-cabccd831789.PNG',
                'article_id' => 2,
                'created_at' => '2024-12-19 23:56:28',
                'updated_at' => '2024-12-19 23:56:28',
            ),
        ));
        
        
    }
}