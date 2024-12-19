<?php

namespace Database\Factories\System\CustomerService;

use App\Models\System\CustomerService\CustomerCardMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\System\CustomerService\CustomerCardMessage>
 */
class CustomerCardMessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'message' => fake()->sentence(random_int(10, 100)),
            'created_at' => fake()->dateTimeBetween('-5 month'),
        ];
    }
}
