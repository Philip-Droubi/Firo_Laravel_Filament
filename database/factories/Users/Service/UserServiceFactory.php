<?php

namespace Database\Factories\Users\Service;

use App\Models\Administration\App\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users\Service\UserService>
 */
class UserServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryID = Category::query()->inRandomOrder()->first()->id;

        return [
            'category_id' => $categoryID,
            'title' => fake()->text(100),
            'body' => fake()->realTextBetween(160, 500),
            'is_visible' => fake()->randomElement([0, 1]),
            'created_at' => fake()->dateTimeBetween('-14 month'),
        ];
    }
}
