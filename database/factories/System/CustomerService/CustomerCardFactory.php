<?php

namespace Database\Factories\System\CustomerService;

use App\Enums\CustomerServiceCardStatus;
use App\Enums\CustomerServiceTypes;
use App\Models\System\CustomerService\CustomerCard;
use App\Models\System\CustomerService\CustomerCardMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\System\CustomerService\CustomerCard>
 */
class CustomerCardFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::where('role_id', 3)->inRandomOrder()->first()->id,
            'title' => fake()->realTextBetween(),
            'description' => fake()->paragraph(8),
            'is_private' => fake()->randomElement([0, 1]),
            'type' => fake()->randomElement(CustomerServiceTypes::values()),
            'status' => fake()->randomElement(CustomerServiceCardStatus::values()),
            'deleted_at' => fake()->randomElement([null, null, null, null, fake()->dateTimeBetween('-10 month')]),
            'created_at' => fake()->dateTimeBetween('-10 month'),
        ];
    }
}
