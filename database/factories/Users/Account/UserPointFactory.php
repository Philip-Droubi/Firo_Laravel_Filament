<?php

namespace Database\Factories\Users\Account;

use App\Enums\UserPointsCases;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users\Account\UserPoint>
 */
class UserPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'points' => random_int(-100, 100),
            'case' => fake()->randomElement(UserPointsCases::values()),
        ];
    }
}
