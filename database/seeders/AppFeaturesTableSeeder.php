<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppFeaturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('app_features')->delete();

        \DB::table('app_features')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Application for users',
                'is_active' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-06-29 02:53:26',
                'updated_at' => '2024-06-29 02:53:26',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Application for admins',
                'is_active' => 1,
                'updated_by' => 1,
                'created_at' => '2024-06-29 02:54:49',
                'updated_at' => '2024-06-29 00:25:54',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Users register',
                'is_active' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-06-29 02:54:49',
                'updated_at' => '2024-06-29 02:54:49',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Auth System',
                'is_active' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-06-29 02:54:49',
                'updated_at' => '2024-06-29 02:54:49',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Users profile update',
                'is_active' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-06-29 02:54:49',
                'updated_at' => '2024-06-29 02:54:49',
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Feedbacks',
                'is_active' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-06-29 02:54:49',
                'updated_at' => '2024-06-29 02:54:49',
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'Notifications',
                'is_active' => 0,
                'updated_by' => NULL,
                'created_at' => '2024-06-29 02:54:49',
                'updated_at' => '2024-06-29 02:54:49',
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'Reporting System',
                'is_active' => 1,
                'updated_by' => NULL,
                'created_at' => '2024-06-29 03:00:18',
                'updated_at' => '2024-06-29 03:00:18',
            ),
        ));
    }
}
