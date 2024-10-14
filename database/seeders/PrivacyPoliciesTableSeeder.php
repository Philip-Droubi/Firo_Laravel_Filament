<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrivacyPoliciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('privacy_policies')->delete();

        \DB::table('privacy_policies')->insert(array(
            0 =>
            array(
                'id' => 1,
                'lang' => 'en',
                'text' => '<h1>privacy policy</h1>
<h4>Firo</h4>
<p>Text</p>',
                'last_update_by' => NULL,
                'created_at' => '2024-02-02 02:36:52',
                'updated_at' => '2024-02-02 02:36:52',
            ),
            1 =>
            array(
                'id' => 2,
                'lang' => 'ar',
                'text' => '<h1>سياسة الخصوصية</h1>
<h4>فيرو</h4>
<p>نص</p>',
                'last_update_by' => NULL,
                'created_at' => '2024-02-02 02:36:52',
                'updated_at' => '2024-02-02 02:36:52',
            ),
        ));
    }
}
