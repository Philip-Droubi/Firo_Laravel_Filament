<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MainReportsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('main_reports')->delete();

        \DB::table('main_reports')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => '{"en":"Harassment or bullying of others.","ar":"التحرش أو التنمر على الآخرين."}',
                'created_at' => '2024-03-04 19:12:11',
                'updated_at' => '2024-03-04 19:12:11',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => '{"en":"Inappropriate content that is  or usage policy violation.","ar":"محتوى غير لائق أو مخالف لسياسة الاستخدام"}',
                'created_at' => '2024-03-04 19:14:55',
                'updated_at' => '2024-03-04 19:14:55',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => '{"en":"Copyright and intellectual property infringement.","ar":"انتهاك حقوق النشر و الملكية الفكرية."}',
                'created_at' => '2024-03-04 19:15:41',
                'updated_at' => '2024-03-04 19:15:41',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => '{"en":"Fraud or illegal activity.","ar":"احتيال أو نشاط غير قانوني."}',
                'created_at' => '2024-03-04 19:16:30',
                'updated_at' => '2024-03-04 19:16:30',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => '{"en":"False or inaccurate information.","ar":"نشر معلومات كاذبة أو غير دقيقة."}',
                'created_at' => '2024-03-04 19:17:24',
                'updated_at' => '2024-03-04 19:17:24',
            ),
            5 =>
            array(
                'id' => 6,
                'name' => '{"en":"Violence or hatred.","ar":"عنف أو كراهية."}',
                'created_at' => '2024-03-04 19:18:04',
                'updated_at' => '2024-03-04 19:18:04',
            ),
            6 =>
            array(
                'id' => 7,
                'name' => '{"en":"Illegal behavior.","ar":"سلوك غير قانوني."}',
                'created_at' => '2024-03-04 19:18:33',
                'updated_at' => '2024-03-04 19:18:33',
            ),
            7 =>
            array(
                'id' => 8,
                'name' => '{"en":"Promoting inappropriate products or services.","ar":"الترويج لمنتجات أو خدمات غير ملائمة."}',
                'created_at' => '2024-03-04 19:18:56',
                'updated_at' => '2024-03-04 19:18:56',
            ),
            8 =>
            array(
                'id' => 9,
                'name' => '{"en":"Violation of privacy policies.","ar":"انتهاك سياسات الخصوصية."}',
                'created_at' => '2024-03-04 19:19:39',
                'updated_at' => '2024-03-04 19:19:39',
            ),
            9 =>
            array(
                'id' => 10,
                'name' => '{"en":"Fraud or scam.","ar":"إحتيال أو نصب."}',
                'created_at' => '2024-03-04 19:20:15',
                'updated_at' => '2024-03-04 19:20:15',
            ),
            10 =>
            array(
                'id' => 11,
                'name' => '{"en":"Incitement to hatred or racial, ethnic or religious discrimination.","ar":"التحريض على الكراهية أو التمييز العنصري أو العرقي أو الديني."}',
                'created_at' => '2024-03-04 19:21:50',
                'updated_at' => '2024-03-04 19:21:50',
            ),
            11 =>
            array(
                'id' => 12,
                'name' => '{"en":"False or misleading information.","ar":"معلومات كاذبة أو مضللة."}',
                'created_at' => '2024-03-04 19:21:50',
                'updated_at' => '2024-03-04 19:21:50',
            ),
        ));
    }
}
