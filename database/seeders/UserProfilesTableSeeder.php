<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_profiles')->delete();
        
        \DB::table('user_profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 11,
                'bg_img_url' => NULL,
                'bio' => 'Hi my name is Omar, I\'m a full stack developer',
                'portfolio' => 'https://www.example.com',
                'is_freelancer' => 1,
                'is_stakeholder' => 1,
                'TFA' => 0,
                'banned_until' => NULL,
                'created_at' => '2024-11-07 20:48:36',
                'updated_at' => '2024-11-07 20:48:36',
            ),
        ));
        
        
    }
}