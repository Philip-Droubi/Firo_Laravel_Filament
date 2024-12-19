<?php

namespace Database\Seeders;

use App\Models\System\CustomerService\CustomerCard;
use App\Models\System\CustomerService\CustomerCardMessage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = CustomerCard::factory()->count(58)
            ->create();

        //Card Messages Seeding
        foreach ($cards as $card) {
            $usersArray = [$card->user_id, User::whereNot('role_id', 3)->inRandomOrder()->first()->id];
            $count = random_int(min: 10, max: 20);
            for ($i = 0; $i < $count; $i++) {
                CustomerCardMessage::factory()->create([
                    'user_id' => $usersArray[array_rand($usersArray)],
                    'card_id' => $card->id,
                ]);
            }
        }
    }
}