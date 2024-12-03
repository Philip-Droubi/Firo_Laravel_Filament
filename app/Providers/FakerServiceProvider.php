<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Faker\SkillsProvider;
use Faker\Factory;
use Faker\Generator;

class FakerServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new SkillsProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
