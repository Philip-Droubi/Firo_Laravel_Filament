<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Super Admin',
                'description' => 'Owner of the system.',
                'created_at' => '2023-12-14 22:52:13',
                'updated_at' => '2023-12-14 22:52:13',
                'created_by' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Admin',
                'description' => 'Admin in the system.',
                'created_at' => '2023-12-14 22:52:13',
                'updated_at' => '2023-12-14 22:52:13',
                'created_by' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'user',
                'description' => 'User in the system.',
                'created_at' => '2023-12-14 22:52:13',
                'updated_at' => '2023-12-14 22:52:13',
                'created_by' => NULL,
            ),
        ));
    }
}
