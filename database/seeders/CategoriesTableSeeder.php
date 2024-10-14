<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"Design and editing","ar":"تصميم و تحرير"}',
                'created_at' => '2024-03-27 20:54:25',
                'updated_at' => '2024-03-27 20:54:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"Software development","ar":"تطوير برمجيات"}',
                'created_at' => '2024-03-27 20:55:04',
                'updated_at' => '2024-03-27 20:55:04',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en":"Writing and translation","ar":"كتابة وترجمة"}',
                'created_at' => '2024-03-27 20:55:25',
                'updated_at' => '2024-03-27 20:55:25',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '{"en":"Digital marketing","ar":"تسويق رقمي"}',
                'created_at' => '2024-03-27 20:55:45',
                'updated_at' => '2024-03-27 20:55:45',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '{"en":"E-Learning","ar":"تعليم عن بعد"}',
                'created_at' => '2024-03-27 20:56:28',
                'updated_at' => '2024-03-27 20:56:28',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '{"en":"Data entry","ar":"إدخال بيانات"}',
                'created_at' => '2024-03-27 20:57:06',
                'updated_at' => '2024-03-27 20:57:06',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '{"en":"consulting services","ar":"خدمات استشارية"}',
                'created_at' => '2024-03-27 20:57:57',
                'updated_at' => '2024-03-27 20:57:57',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '{"en":"Planning and management","ar":"تخطيط و إدارة"}',
                'created_at' => '2024-03-27 21:09:27',
                'updated_at' => '2024-03-27 21:09:27',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '{"en":"Virtual Assistance","ar":"مساعد رقمي"}',
                'created_at' => '2024-03-27 21:13:15',
                'updated_at' => '2024-03-27 21:13:15',
            ),
        ));
        
        
    }
}