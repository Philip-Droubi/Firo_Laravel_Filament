<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactUsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('contact_us')->delete();

        \DB::table('contact_us')->insert(array(
            0 =>
            array(
                'id' => 1,
                'type' => 'email',
                'link' => 'ewq@ewq.com',
                'created_by' => 1,
                'created_at' => '2024-02-16 01:04:42',
                'updated_at' => '2024-02-16 01:04:42',
            ),
            1 =>
            array(
                'id' => 2,
                'type' => 'phone-number',
                'link' => '+963-987654321',
                'created_by' => 1,
                'created_at' => '2024-02-16 01:05:04',
                'updated_at' => '2024-02-16 01:05:04',
            ),
            2 =>
            array(
                'id' => 3,
                'type' => 'phone-number',
                'link' => '+963-959880596',
                'created_by' => 1,
                'created_at' => '2024-02-16 01:05:50',
                'updated_at' => '2024-02-16 01:05:50',
            ),
            3 =>
            array(
                'id' => 4,
                'type' => 'link',
                'link' => 'http://www.example.com',
                'created_by' => 1,
                'created_at' => '2024-02-16 01:06:50',
                'updated_at' => '2024-02-16 01:06:50',
            ),
            4 =>
            array(
                'id' => 5,
                'type' => 'whatsApp',
                'link' => '0099988877765',
                'created_by' => 1,
                'created_at' => '2024-02-16 01:07:07',
                'updated_at' => '2024-02-16 01:07:07',
            ),
        ));
    }
}
