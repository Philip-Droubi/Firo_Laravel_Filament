<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutUsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('about_us')->delete();

        \DB::table('about_us')->insert(array(
            0 =>
            array(
                'id' => 1,
                'lang' => 'en',
                'text' => '<h1>About Us</h1>
<h4>FIRO</h4>
<p>Text</p>',
                'last_update_by' => NULL,
                'created_at' => '2024-02-02 02:28:15',
                'updated_at' => '2024-02-02 02:28:15',
            ),
            1 =>
            array(
                'id' => 2,
                'lang' => 'ar',
                'text' => '<h1>حول</h1>
<h4>فيرو</h4>
<p>نص</p>',
                'last_update_by' => NULL,
                'created_at' => '2024-02-02 02:28:15',
                'updated_at' => '2024-02-02 02:28:15',
            ),
        ));
    }
}
