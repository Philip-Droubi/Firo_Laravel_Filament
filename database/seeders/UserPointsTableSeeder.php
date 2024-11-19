<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserPointsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_points')->delete();
        
        \DB::table('user_points')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 11,
                'points' => 20,
                'case' => 'add image case',
                'created_at' => '2024-11-18 21:18:08',
                'updated_at' => '2024-11-18 21:18:08',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 11,
                'points' => 10,
                'case' => 'add image case',
                'created_at' => '2024-11-18 21:18:08',
                'updated_at' => '2024-11-18 21:18:08',
            ),
        ));
        
        
    }
}