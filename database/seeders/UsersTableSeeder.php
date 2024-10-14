<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'role_id' => 1,
                'first_name' => 'Philip',
                'mid_name' => 'Marwan',
                'last_name' => 'Droubi',
                'account_name' => 'Phil-admin',
                'email' => 'philip@email.com',
                'password' => '$2y$12$n4wGkpWm1XAlNBDruswqQuKmkXbQhdqvXlGM0NegUA80pDovOXLOy',
                'phone_number' => '+963959773659',
                'country_id' => 15,
                'state_id' => 1,
                'birth_date' => '2001-08-29',
                'img_url' => NULL,
                'deactive_at' => NULL,
                'last_seen' => '2024-10-07 21:43:47',
                'remember_token' => NULL,
                'created_at' => '2024-10-07 21:45:33',
                'updated_at' => '2024-10-07 21:45:33',
            ),
        ));
    }
}
