<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesAbilitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles_abilities')->delete();

        \DB::table('roles_abilities')->insert(array(
            0 =>
            array(
                'id' => 1,
                'role_id' => 1,
                'ability_id' => 1,
                'created_at' => '2023-12-14 22:53:50',
                'updated_at' => '2023-12-14 22:53:50',
            ),
            1 =>
            array(
                'id' => 2,
                'role_id' => 2,
                'ability_id' => 3,
                'created_at' => '2023-12-14 22:53:50',
                'updated_at' => '2023-12-14 22:53:50',
            ),
            2 =>
            array(
                'id' => 3,
                'role_id' => 2,
                'ability_id' => 4,
                'created_at' => '2024-08-26 00:41:52',
                'updated_at' => '2024-08-26 00:41:52',
            ),
            3 =>
            array(
                'id' => 4,
                'role_id' => 2,
                'ability_id' => 5,
                'created_at' => '2024-08-26 00:41:52',
                'updated_at' => '2024-08-26 00:41:52',
            ),
            4 =>
            array(
                'id' => 5,
                'role_id' => 2,
                'ability_id' => 6,
                'created_at' => '2024-08-26 00:41:52',
                'updated_at' => '2024-08-26 00:41:52',
            ),
            5 =>
            array(
                'id' => 6,
                'role_id' => 2,
                'ability_id' => 7,
                'created_at' => '2024-08-26 00:41:52',
                'updated_at' => '2024-08-26 00:41:52',
            ),
            6 =>
            array(
                'id' => 7,
                'role_id' => 2,
                'ability_id' => 8,
                'created_at' => '2024-08-26 00:41:52',
                'updated_at' => '2024-08-26 00:41:52',
            ),
            7 =>
            array(
                'id' => 8,
                'role_id' => 2,
                'ability_id' => 9,
                'created_at' => '2024-08-26 00:41:52',
                'updated_at' => '2024-08-26 00:41:52',
            ),
        ));
    }
}
