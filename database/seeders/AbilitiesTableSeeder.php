<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AbilitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('abilities')->delete();

        \DB::table('abilities')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'All Abilities',
                'description' => 'All abilities in the system.',
                'created_at' => '2023-12-14 22:50:20',
                'updated_at' => '2023-12-14 22:50:20',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Control App Features',
                'description' => 'Control app features by changing its status and show it. ',
                'created_at' => '2023-12-14 22:50:20',
                'updated_at' => '2023-12-14 22:50:20',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'CRUD admins only',
                'description' => 'Create update and deactive admins only in the system.',
                'created_at' => '2023-12-14 22:50:20',
                'updated_at' => '2023-12-14 22:50:20',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Control normal users',
                'description' => 'Manage users in the system.',
                'created_at' => '2023-12-14 22:50:20',
                'updated_at' => '2023-12-14 22:50:20',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'CRUD roles',
                'description' => 'Create read update and delete roles in the system.',
                'created_at' => '2023-12-14 22:50:20',
                'updated_at' => '2023-12-14 22:50:20',
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Generate reports',
                'description' => 'User can create PDF and Excel reports.',
                'created_at' => '2023-12-14 22:50:20',
                'updated_at' => '2023-12-14 22:50:20',
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'Manage notifications',
                'description' => 'Manage notifications in the system by sending public and private notifications.',
                'created_at' => '2024-08-26 00:05:35',
                'updated_at' => '2024-08-26 00:05:35',
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'Control system main info',
                'description' => 'Manage System info which is: countries, states, about-us, faq, tos, privacy policies, contact-us, app-version, system feedback, reporting system, skills, categories and sub-categories,',
                'created_at' => '2024-08-26 00:12:08',
                'updated_at' => '2024-08-26 00:12:08',
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'Manage articles system',
                'description' => 'User can CRUD articles in the system.',
                'created_at' => '2024-08-26 00:18:13',
                'updated_at' => '2024-08-26 00:18:13',
            ),

            9 =>
            array(
                'id' => 10,
                'name' => 'Manage user services',
                'description' => 'User can control users services in the system.',
                'created_at' => '2024-08-26 00:18:13',
                'updated_at' => '2024-08-26 00:18:13',
            ),
        ));
    }
}