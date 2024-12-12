<?php

namespace Database\Factories;

use App\Models\System\Info\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countryID = Country::inRandomOrder()->first()->id;

        return [
            'role_id' => 3,
            'first_name' => fake()->firstName(),
            'mid_name' => random_int(0, 10000) % 3 == 0 ? fake()->firstName() : null,
            'last_name' => fake()->lastName(),
            'account_name' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'phone_number' => fake()->phoneNumber(),
            'country_id' => $countryID,
            'state_id' => $countryID == 15 ? function () {
                return Country::inRandomOrder()->first()->id;
            } : null,
            'birth_date' => fake()->date(max: '2016-01-01'),
            'img_url' => fake()->imageUrl(),
            'last_seen' => fake()->dateTimeBetween('-1 month'),
            'remember_token' => Str::random(10),
            'created_at' => fake()->dateTimeBetween('-2 years'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
