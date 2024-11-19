<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSkillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_skills')->delete();
        
        \DB::table('user_skills')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 11,
                'skill' => 'Laravel',
                'created_at' => '2024-11-18 21:18:49',
                'updated_at' => '2024-11-18 21:18:49',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 11,
                'skill' => 'Filament',
                'created_at' => '2024-11-18 21:18:49',
                'updated_at' => '2024-11-18 21:18:49',
            ),
        ));
        
        
    }
}