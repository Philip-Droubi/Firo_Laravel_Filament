<?php

namespace Database\Factories\Users\Account;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users\Account\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bg_img_url' => fake()->imageUrl(),
            'bio' => fake()->realText(400),
            'portfolio' => fake()->url(),
            'is_freelancer' => fake()->randomElement([0, 1]),
            'is_stakeholder' => fake()->randomElement([0, 1]),
            'tfa' => fake()->randomElement([0, 1]),
        ];
    }
}
