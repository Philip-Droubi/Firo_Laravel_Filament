<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Users\Account\UserPoint;
use App\Models\Users\Account\UserProfile;
use App\Models\Users\Account\UserSkill;
use App\Models\Users\Service\UserService;
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
                'birth_date' => NULL,
                'img_url' => NULL,
                'deactive_at' => NULL,
                'last_seen' => '2024-11-18 18:14:09',
                'remember_token' => 'aCNoA241yNNWR7SREuej9f4lTqxXcdp6SARVT1DtT99bjqR1bubcMt5ROVU6',
                'created_at' => '2024-10-07 21:45:33',
                'updated_at' => '2024-11-17 01:08:28',
            ),
            1 =>
            array(
                'id' => 2,
                'role_id' => 2,
                'first_name' => 'Test',
                'mid_name' => 'Test',
                'last_name' => 'Test',
                'account_name' => 'test-admin',
                'email' => 'test@email.com',
                'password' => 'test',
                'phone_number' => '+96388465132',
                'country_id' => 15,
                'state_id' => 2,
                'birth_date' => '1999-09-09',
                'img_url' => 'users/profiles-images/admins//01JCXSYK25XZT9K4ZTPT5QDYFA.jpg',
                'deactive_at' => '2024-11-17 19:35:49',
                'last_seen' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-11-16 04:09:25',
                'updated_at' => '2024-11-17 19:35:49',
            ),
            2 =>
            array(
                'id' => 3,
                'role_id' => 2,
                'first_name' => 'Sami',
                'mid_name' => 'Shadi',
                'last_name' => 'Fadi',
                'account_name' => 'sami-admin',
                'email' => 'sami@email.com',
                'password' => '$2y$12$3Yxm0lpe0x5v7be3SUBJI./rxHosvsNQyEBF9r1NQ3.JO3Vk3yrE2',
                'phone_number' => '+963851445698',
                'country_id' => 15,
                'state_id' => 1,
                'birth_date' => '2003-03-06',
                'img_url' => NULL,
                'deactive_at' => NULL,
                'last_seen' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-11-17 18:02:44',
                'updated_at' => '2024-11-18 01:38:42',
            ),
        ));

        User::factory()->count(562)
            ->has(UserSkill::factory()->count(6), 'skills')
            ->has(UserProfile::factory(), 'profile')
            ->has(UserPoint::factory()->count(7), 'points')
            ->has(UserService::factory()->count(12), 'services')
            ->create();
    }
}