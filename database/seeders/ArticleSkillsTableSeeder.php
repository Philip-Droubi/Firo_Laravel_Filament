<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticleSkillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('article_skills')->delete();
        
        \DB::table('article_skills')->insert(array (
            0 => 
            array (
                'id' => 3,
                'article_id' => 2,
                'skill' => 'Laravel',
                'created_at' => '2024-12-19 23:56:28',
                'updated_at' => '2024-12-19 23:56:28',
            ),
            1 => 
            array (
                'id' => 4,
                'article_id' => 2,
                'skill' => 'PHP',
                'created_at' => '2024-12-19 23:56:28',
                'updated_at' => '2024-12-19 23:56:28',
            ),
        ));
        
        
    }
}