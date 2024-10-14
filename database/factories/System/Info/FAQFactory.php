<?php

namespace Database\Factories\System\Info;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\System\Info\FAQ>
 */
class FAQFactory extends Factory
{
    public function definition(): array
    {
        $arFaker = \Faker\Factory::create('ar_SA');
        return [
            'question' => [
                'ar' => $arFaker->unique()->realText(100),
                'en' => $this->faker->unique()->sentence(8),
            ],
            'answer' => [
                'ar' => $arFaker->unique()->realText(500),
                'en' => $this->faker->unique()->paragraph(6),
            ],
            "last_update_by" => 1,
        ];
    }
}
