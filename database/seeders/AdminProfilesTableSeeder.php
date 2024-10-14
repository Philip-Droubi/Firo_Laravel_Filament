<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_profiles')->delete();
        
        \DB::table('admin_profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'about_user' => 'System super admin',
                'created_by' => NULL,
                'created_at' => '2024-10-07 21:45:33',
                'updated_at' => '2024-10-07 21:45:33',
            ),
        ));
        
        
    }
}