<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(AbilitiesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolesAbilitiesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AdminProfilesTableSeeder::class);
        $this->call(AboutUsTableSeeder::class);
        $this->call(PrivacyPoliciesTableSeeder::class);
        $this->call(TosTableSeeder::class);
        $this->call(ContactUsTableSeeder::class);
        $this->call(FAQTableSeeder::class);
        $this->call(MainReportsTableSeeder::class);
        $this->call(DefinedSkillsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        $this->call(AppFeaturesTableSeeder::class);
        $this->call(LoginHistoryTableSeeder::class);
    }
}
