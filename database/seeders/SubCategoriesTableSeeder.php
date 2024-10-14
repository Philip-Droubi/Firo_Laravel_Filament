<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sub_categories')->delete();

        \DB::table('sub_categories')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => '{"en":"Website","ar":"إنشاء موقع"}',
                'category_id' => 2,
                'created_at' => '2024-04-04 18:41:56',
                'updated_at' => '2024-04-04 18:41:56',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => '{"en":"Website design","ar":"تصميم موقع"}',
                'category_id' => 1,
                'created_at' => '2024-04-04 18:42:44',
                'updated_at' => '2024-04-04 18:42:44',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => '{"en":"Logo design","ar":"تصميم لوغو"}',
                'category_id' => 1,
                'created_at' => '2024-04-04 18:43:19',
                'updated_at' => '2024-04-04 18:43:19',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => '{"en":"Cover page design","ar":"تصميم غلاف"}',
                'category_id' => 1,
                'created_at' => '2024-04-04 18:44:02',
                'updated_at' => '2024-04-04 18:44:02',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => '{"en":"Mobile application","ar":"بناء تطبيق موبايل"}',
                'category_id' => 2,
                'created_at' => '2024-04-04 18:44:51',
                'updated_at' => '2024-04-04 18:44:51',
            ),
        ));
    }
}
