<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefinedSkillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('defined_skills')->delete();

        \DB::table('defined_skills')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Communication',
                'description' => 'Ability to convey information clearly and effectively',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Problem-solving',
                'description' => 'Capability to identify and solve complex problems',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Time management',
                'description' => 'Skill to prioritize tasks and manage time efficiently',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Leadership',
                'description' => 'Ability to lead and motivate a team towards a common goal',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Creativity',
                'description' => 'Capacity to think innovatively and generate new ideas',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Data Analysis',
                'description' => 'Analyze data',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'Graphic Design',
                'description' => 'Create visual content',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'Project Management',
                'description' => 'Manage projects',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'Customer Service',
                'description' => 'Assist customers',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'Marketing',
                'description' => 'Promote products/services',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            10 =>
            array(
                'id' => 11,
                'name' => 'Sales',
                'description' => 'Sell products/services',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            11 =>
            array(
                'id' => 12,
                'name' => 'Critical Thinking',
                'description' => 'Analyze and evaluate information',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'Adaptability',
                'description' => 'Adjust to new situations',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            13 =>
            array(
                'id' => 14,
                'name' => 'Negotiation',
                'description' => 'Reach agreements',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            14 =>
            array(
                'id' => 15,
                'name' => 'Public Speaking',
                'description' => 'Speak in front of audiences',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            15 =>
            array(
                'id' => 16,
                'name' => 'Research',
                'description' => 'Conduct investigations',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            16 =>
            array(
                'id' => 17,
                'name' => 'Writing',
                'description' => 'Compose written content',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            17 =>
            array(
                'id' => 18,
                'name' => 'Social Media Management',
                'description' => 'Manage social media platforms',
                'created_at' => '2024-02-27 19:32:49',
                'updated_at' => '2024-02-27 19:32:49',
            ),
            18 =>
            array(
                'id' => 19,
                'name' => 'Python',
                'description' => 'Versatile and easy-to-learn language for web development, data analysis, and automation',
                'created_at' => '2024-02-27 19:40:21',
                'updated_at' => '2024-02-27 19:40:21',
            ),
            19 =>
            array(
                'id' => 20,
                'name' => 'Java',
                'description' => 'Object-oriented language used for building enterprise applications and Android apps',
                'created_at' => '2024-02-27 19:40:21',
                'updated_at' => '2024-02-27 19:40:21',
            ),
            20 =>
            array(
                'id' => 21,
                'name' => 'JavaScript',
                'description' => 'Essential for front-end web development and interactive user interfaces',
                'created_at' => '2024-02-27 19:40:21',
                'updated_at' => '2024-02-27 19:40:21',
            ),
        ));
    }
}
