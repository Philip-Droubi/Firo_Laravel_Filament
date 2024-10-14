<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_id' => 15,
                'name_en' => 'Damascus',
                'name_ar' => 'دمشق',
                'created_at' => '2024-02-26 06:07:46',
                'updated_at' => '2024-02-26 06:07:46',
            ),
            1 => 
            array (
                'id' => 2,
                'country_id' => 15,
                'name_en' => 'Rif Dimashq',
                'name_ar' => 'ريف دمشق',
                'created_at' => '2024-02-26 06:07:46',
                'updated_at' => '2024-02-26 06:07:46',
            ),
            2 => 
            array (
                'id' => 3,
                'country_id' => 15,
                'name_en' => 'Aleppo',
                'name_ar' => 'حلب',
                'created_at' => '2024-02-26 06:09:02',
                'updated_at' => '2024-02-26 06:09:02',
            ),
            3 => 
            array (
                'id' => 4,
                'country_id' => 15,
                'name_en' => 'Homs',
                'name_ar' => 'حمص',
                'created_at' => '2024-02-26 06:09:02',
                'updated_at' => '2024-02-26 06:09:02',
            ),
            4 => 
            array (
                'id' => 5,
                'country_id' => 15,
                'name_en' => 'Hama',
                'name_ar' => 'حماة',
                'created_at' => '2024-02-26 06:09:02',
                'updated_at' => '2024-02-26 06:09:02',
            ),
            5 => 
            array (
                'id' => 6,
                'country_id' => 15,
                'name_en' => 'Raqqa',
                'name_ar' => 'الرقة',
                'created_at' => '2024-02-26 06:09:02',
                'updated_at' => '2024-02-26 06:09:02',
            ),
            6 => 
            array (
                'id' => 7,
                'country_id' => 15,
                'name_en' => 'Deir ez-Zor',
                'name_ar' => 'دير الزور',
                'created_at' => '2024-02-26 06:09:02',
                'updated_at' => '2024-02-26 06:09:02',
            ),
            7 => 
            array (
                'id' => 8,
                'country_id' => 15,
                'name_en' => 'Quneitra',
                'name_ar' => 'القنيطرة',
                'created_at' => '2024-02-26 06:09:02',
                'updated_at' => '2024-02-26 06:09:02',
            ),
            8 => 
            array (
                'id' => 9,
                'country_id' => 15,
                'name_en' => 'Tartus',
                'name_ar' => 'طرطوس',
                'created_at' => '2024-02-26 06:09:02',
                'updated_at' => '2024-02-26 06:09:02',
            ),
            9 => 
            array (
                'id' => 10,
                'country_id' => 15,
                'name_en' => 'Daraa',
                'name_ar' => 'درعا',
                'created_at' => '2024-02-26 06:09:02',
                'updated_at' => '2024-02-26 06:09:02',
            ),
            10 => 
            array (
                'id' => 11,
                'country_id' => 15,
                'name_en' => 'As-Suwayda',
                'name_ar' => 'السويداء',
                'created_at' => '2024-02-26 06:13:37',
                'updated_at' => '2024-02-26 06:13:37',
            ),
            11 => 
            array (
                'id' => 12,
                'country_id' => 15,
                'name_en' => 'Idlib',
                'name_ar' => 'إدلب',
                'created_at' => '2024-02-26 06:13:37',
                'updated_at' => '2024-02-26 06:13:37',
            ),
            12 => 
            array (
                'id' => 13,
                'country_id' => 15,
                'name_en' => 'Al-Hasakah',
                'name_ar' => 'الحسكة',
                'created_at' => '2024-02-26 06:14:16',
                'updated_at' => '2024-02-26 06:14:16',
            ),
            13 => 
            array (
                'id' => 14,
                'country_id' => 15,
                'name_en' => 'Latakia',
                'name_ar' => 'اللاذقية',
                'created_at' => '2024-02-26 06:14:16',
                'updated_at' => '2024-02-26 06:14:16',
            ),
        ));
        
        
    }
}