<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LoginHistoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('login_history')->delete();
        
        \DB::table('login_history')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ip_address' => '94.47.59.114',
                'country_code' => 'SY',
                'device_name' => 'Samsung j7',
                'country' => 'Syria',
                'city' => 'Damascus',
                'user_id' => 11,
                'created_at' => '2024-11-18 21:20:05',
                'updated_at' => '2024-11-18 21:20:05',
            ),
        ));
        
        
    }
}