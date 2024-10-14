<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_en' => 'Taiwan',
                'name_ar' => 'مقاطعة تايوان الصينية',
                'code' => 'TW',
                'dial_code' => '886',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name_en' => 'Tonga',
                'name_ar' => 'تونغا',
                'code' => 'TO',
                'dial_code' => '676',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            2 => 
            array (
                'id' => 3,
                'name_en' => 'Wallis And Futuna Islands',
                'name_ar' => 'واليس وفوتونا',
                'code' => 'WF',
                'dial_code' => '681',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            3 => 
            array (
                'id' => 4,
                'name_en' => 'United States Minor Outlying Islands',
                'name_ar' => 'جزر الولايات المتحدة البعيدة الصغرى',
                'code' => 'UM',
                'dial_code' => '1',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            4 => 
            array (
                'id' => 5,
                'name_en' => 'Vanuatu',
                'name_ar' => 'فانواتو',
                'code' => 'VU',
                'dial_code' => '678',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            5 => 
            array (
                'id' => 6,
                'name_en' => 'United Arab Emirates',
                'name_ar' => 'الإمارات العربية المتحدة',
                'code' => 'AE',
                'dial_code' => '971',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            6 => 
            array (
                'id' => 7,
                'name_en' => 'Turks And Caicos Islands',
                'name_ar' => 'جزر تركس وكايكوس',
                'code' => 'TC',
                'dial_code' => '+1-649',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            7 => 
            array (
                'id' => 8,
                'name_en' => 'The Bahamas',
                'name_ar' => 'جزر البهاما',
                'code' => 'BS',
                'dial_code' => '+1-242',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            8 => 
            array (
                'id' => 9,
                'name_en' => 'Turkmenistan',
                'name_ar' => 'تركمانستان',
                'code' => 'TM',
                'dial_code' => '993',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            9 => 
            array (
                'id' => 10,
                'name_en' => 'Tokelau',
                'name_ar' => 'توكيلاو',
                'code' => 'TK',
                'dial_code' => '690',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            10 => 
            array (
                'id' => 11,
                'name_en' => 'Tuvalu',
                'name_ar' => 'توفالو',
                'code' => 'TV',
                'dial_code' => '688',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            11 => 
            array (
                'id' => 12,
            'name_en' => 'Virgin Islands (US)',
                'name_ar' => 'جزر فيرجن ، الولايات المتحدة',
                'code' => 'VI',
                'dial_code' => '+1-340',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            12 => 
            array (
                'id' => 13,
                'name_en' => 'Western Sahara',
                'name_ar' => 'الصحراء الغربية',
                'code' => 'EH',
                'dial_code' => '212',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            13 => 
            array (
                'id' => 14,
            'name_en' => 'Virgin Islands (British)',
                'name_ar' => 'جزر العذراء البريطانية',
                'code' => 'VG',
                'dial_code' => '+1-284',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            14 => 
            array (
                'id' => 15,
                'name_en' => 'Syria',
                'name_ar' => 'الجمهورية العربية السورية',
                'code' => 'SY',
                'dial_code' => '963',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            15 => 
            array (
                'id' => 16,
            'name_en' => 'Vatican City State (Holy See)',
            'name_ar' => 'الكرسي الرسولي (دولة الفاتيكان)',
                'code' => 'VA',
                'dial_code' => '379',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            16 => 
            array (
                'id' => 17,
                'name_en' => 'United Kingdom',
                'name_ar' => 'المملكة المتحدة',
                'code' => 'GB',
                'dial_code' => '44',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            17 => 
            array (
                'id' => 18,
                'name_en' => 'United States',
                'name_ar' => 'الولايات المتحدة',
                'code' => 'US',
                'dial_code' => '1',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            18 => 
            array (
                'id' => 19,
                'name_en' => 'Pitcairn Island',
                'name_ar' => 'بيتكيرن',
                'code' => 'PN',
                'dial_code' => '870',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            19 => 
            array (
                'id' => 20,
                'name_en' => 'Svalbard And Jan Mayen Islands',
                'name_ar' => 'سفالبارد وجان ماين',
                'code' => 'SJ',
                'dial_code' => '47',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            20 => 
            array (
                'id' => 21,
                'name_en' => 'Saint Kitts And Nevis',
                'name_ar' => 'سانت كيتس ونيفيس',
                'code' => 'KN',
                'dial_code' => '+1-869',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            21 => 
            array (
                'id' => 22,
                'name_en' => 'Samoa',
                'name_ar' => 'ساموا',
                'code' => 'WS',
                'dial_code' => '685',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            22 => 
            array (
                'id' => 23,
                'name_en' => 'Poland',
                'name_ar' => 'بولندا',
                'code' => 'PL',
                'dial_code' => '48',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            23 => 
            array (
                'id' => 24,
                'name_en' => 'Saint Lucia',
                'name_ar' => 'القديسة لوسيا',
                'code' => 'LC',
                'dial_code' => '+1-758',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            24 => 
            array (
                'id' => 25,
                'name_en' => 'Sweden',
                'name_ar' => 'السويد',
                'code' => 'SE',
                'dial_code' => '46',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            25 => 
            array (
                'id' => 26,
                'name_en' => 'Saint Vincent And The Grenadines',
                'name_ar' => 'سانت فنسنت وجزر غرينادين',
                'code' => 'VC',
                'dial_code' => '+1-784',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            26 => 
            array (
                'id' => 27,
                'name_en' => 'Spain',
                'name_ar' => 'إسبانيا',
                'code' => 'ES',
                'dial_code' => '34',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            27 => 
            array (
                'id' => 28,
                'name_en' => 'Switzerland',
                'name_ar' => 'سويسرا',
                'code' => 'CH',
                'dial_code' => '41',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            28 => 
            array (
                'id' => 29,
                'name_en' => 'Nicaragua',
                'name_ar' => 'نيكاراغوا',
                'code' => 'NI',
                'dial_code' => '505',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            29 => 
            array (
                'id' => 30,
                'name_en' => 'Reunion',
                'name_ar' => 'جمع شمل',
                'code' => 'RE',
                'dial_code' => '262',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            30 => 
            array (
                'id' => 31,
                'name_en' => 'Saint Helena',
                'name_ar' => 'سانت هيلانة',
                'code' => 'SH',
                'dial_code' => '290',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            31 => 
            array (
                'id' => 32,
                'name_en' => 'Slovenia',
                'name_ar' => 'سلوفينيا',
                'code' => 'SI',
                'dial_code' => '386',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            32 => 
            array (
                'id' => 33,
                'name_en' => 'North Macedonia',
                'name_ar' => 'مقدونيا ، جمهورية يوغوسلافيا السابقة',
                'code' => 'MK',
                'dial_code' => '389',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            33 => 
            array (
                'id' => 34,
                'name_en' => 'Saint-Barthelemy',
                'name_ar' => 'سانت بارتيليمي',
                'code' => 'BL',
                'dial_code' => '590',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            34 => 
            array (
                'id' => 35,
                'name_en' => 'Sao Tome and Principe',
                'name_ar' => 'ساو تومي وبرينسيبي',
                'code' => 'ST',
                'dial_code' => '239',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            35 => 
            array (
                'id' => 36,
                'name_en' => 'Panama',
                'name_ar' => 'بنما',
                'code' => 'PA',
                'dial_code' => '507',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            36 => 
            array (
                'id' => 37,
                'name_en' => 'Solomon Islands',
                'name_ar' => 'جزر سليمان',
                'code' => 'SB',
                'dial_code' => '677',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            37 => 
            array (
                'id' => 38,
                'name_en' => 'Suriname',
                'name_ar' => 'سورينام',
                'code' => 'SR',
                'dial_code' => '597',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            38 => 
            array (
                'id' => 39,
            'name_en' => 'Saint-Martin (French part)',
                'name_ar' => 'القديس مارتن',
                'code' => 'MF',
                'dial_code' => '590',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            39 => 
            array (
                'id' => 40,
                'name_en' => 'Portugal',
                'name_ar' => 'البرتغال',
                'code' => 'PT',
                'dial_code' => '351',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            40 => 
            array (
                'id' => 41,
                'name_en' => 'Qatar',
                'name_ar' => 'دولة قطر',
                'code' => 'QA',
                'dial_code' => '974',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            41 => 
            array (
                'id' => 42,
                'name_en' => 'Serbia',
                'name_ar' => 'صربيا',
                'code' => 'RS',
                'dial_code' => '381',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            42 => 
            array (
                'id' => 43,
                'name_en' => 'Niue',
                'name_ar' => 'نيوي',
                'code' => 'NU',
                'dial_code' => '683',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            43 => 
            array (
                'id' => 44,
                'name_en' => 'Saint Pierre and Miquelon',
                'name_ar' => 'سانت بيير وميكلون',
                'code' => 'PM',
                'dial_code' => '508',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            44 => 
            array (
                'id' => 45,
                'name_en' => 'North Korea',
                'name_ar' => 'كوريا، الجمهورية الشعبية الديمقراطية',
                'code' => 'KP',
                'dial_code' => '850',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            45 => 
            array (
                'id' => 46,
                'name_en' => 'Romania',
                'name_ar' => 'رومانيا',
                'code' => 'RO',
                'dial_code' => '40',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            46 => 
            array (
                'id' => 47,
                'name_en' => 'San Marino',
                'name_ar' => 'سان مارينو',
                'code' => 'SM',
                'dial_code' => '378',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            47 => 
            array (
                'id' => 48,
                'name_en' => 'New Zealand',
                'name_ar' => 'نيوزيلاندا',
                'code' => 'NZ',
                'dial_code' => '64',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            48 => 
            array (
                'id' => 49,
                'name_en' => 'Saudi Arabia',
                'name_ar' => 'المملكة العربية السعودية',
                'code' => 'SA',
                'dial_code' => '966',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            49 => 
            array (
                'id' => 50,
            'name_en' => 'Sint Maarten (Dutch part)',
                'name_ar' => 'سينت مارتن',
                'code' => 'SX',
                'dial_code' => '1721',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            50 => 
            array (
                'id' => 51,
                'name_en' => 'Slovakia',
                'name_ar' => 'سلوفاكيا',
                'code' => 'SK',
                'dial_code' => '421',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            51 => 
            array (
                'id' => 52,
                'name_en' => 'Norfolk Island',
                'name_ar' => 'جزيرة نورفولك',
                'code' => 'NF',
                'dial_code' => '672',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            52 => 
            array (
                'id' => 53,
                'name_en' => 'Northern Mariana Islands',
                'name_ar' => 'جزر مريانا الشمالية',
                'code' => 'MP',
                'dial_code' => '+1-670',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            53 => 
            array (
                'id' => 54,
                'name_en' => 'Palau',
                'name_ar' => 'بالاو',
                'code' => 'PW',
                'dial_code' => '680',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            54 => 
            array (
                'id' => 55,
                'name_en' => 'Norway',
                'name_ar' => 'النرويج',
                'code' => 'NO',
                'dial_code' => '47',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            55 => 
            array (
                'id' => 56,
                'name_en' => 'South Georgia',
                'name_ar' => 'جورجيا الجنوبية وجزر ساندويتش الجنوبية',
                'code' => 'GS',
                'dial_code' => '500',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            56 => 
            array (
                'id' => 57,
                'name_en' => 'Montenegro',
                'name_ar' => 'الجبل الأسود',
                'code' => 'ME',
                'dial_code' => '382',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            57 => 
            array (
                'id' => 58,
                'name_en' => 'Ireland',
                'name_ar' => 'أيرلندا',
                'code' => 'IE',
                'dial_code' => '353',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            58 => 
            array (
                'id' => 59,
                'name_en' => 'Kuwait',
                'name_ar' => 'الكويت',
                'code' => 'KW',
                'dial_code' => '965',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            59 => 
            array (
                'id' => 60,
                'name_en' => 'Maldives',
                'name_ar' => 'جزر المالديف',
                'code' => 'MV',
                'dial_code' => '960',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            60 => 
            array (
                'id' => 61,
                'name_en' => 'Malawi',
                'name_ar' => 'ملاوي',
                'code' => 'MW',
                'dial_code' => '265',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            61 => 
            array (
                'id' => 62,
                'name_en' => 'Monaco',
                'name_ar' => 'موناكو',
                'code' => 'MC',
                'dial_code' => '377',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            62 => 
            array (
                'id' => 63,
                'name_en' => 'Montserrat',
                'name_ar' => 'مونتسيرات',
                'code' => 'MS',
                'dial_code' => '+1-664',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            63 => 
            array (
                'id' => 64,
                'name_en' => 'Guam',
                'name_ar' => 'غوام',
                'code' => 'GU',
                'dial_code' => '+1-671',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            64 => 
            array (
                'id' => 65,
                'name_en' => 'Italy',
                'name_ar' => 'إيطاليا',
                'code' => 'IT',
                'dial_code' => '39',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            65 => 
            array (
                'id' => 66,
                'name_en' => 'Japan',
                'name_ar' => 'اليابان',
                'code' => 'JP',
                'dial_code' => '81',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            66 => 
            array (
                'id' => 67,
                'name_en' => 'Kosovo',
                'name_ar' => 'كوسوفو',
                'code' => 'XK',
                'dial_code' => '383',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            67 => 
            array (
                'id' => 68,
                'name_en' => 'Martinique',
                'name_ar' => 'مارتينيك',
                'code' => 'MQ',
                'dial_code' => '596',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            68 => 
            array (
                'id' => 69,
                'name_en' => 'Nauru',
                'name_ar' => 'ناورو',
                'code' => 'NR',
                'dial_code' => '674',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            69 => 
            array (
                'id' => 70,
                'name_en' => 'Guinea-Bissau',
                'name_ar' => 'غينيا بيساو',
                'code' => 'GW',
                'dial_code' => '245',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            70 => 
            array (
                'id' => 71,
                'name_en' => 'Heard Island and McDonald Islands',
                'name_ar' => 'قلب الجزيرة وجزر ماكدونالز',
                'code' => 'HM',
                'dial_code' => '672',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            71 => 
            array (
                'id' => 72,
            'name_en' => 'Man (Isle of)',
                'name_ar' => 'جزيرة آيل أوف مان',
                'code' => 'IM',
                'dial_code' => '+44-1624',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            72 => 
            array (
                'id' => 73,
                'name_en' => 'Germany',
                'name_ar' => 'ألمانيا',
                'code' => 'DE',
                'dial_code' => '49',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            73 => 
            array (
                'id' => 74,
                'name_en' => 'Malta',
                'name_ar' => 'مالطا',
                'code' => 'MT',
                'dial_code' => '356',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            74 => 
            array (
                'id' => 75,
                'name_en' => 'Guernsey and Alderney',
                'name_ar' => 'غيرنسي',
                'code' => 'GG',
                'dial_code' => '+44-1481',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            75 => 
            array (
                'id' => 76,
                'name_en' => 'Guyana',
                'name_ar' => 'غيانا',
                'code' => 'GY',
                'dial_code' => '592',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            76 => 
            array (
                'id' => 77,
                'name_en' => 'Marshall Islands',
                'name_ar' => 'جزر مارشال',
                'code' => 'MH',
                'dial_code' => '692',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            77 => 
            array (
                'id' => 78,
                'name_en' => 'Mauritius',
                'name_ar' => 'موريشيوس',
                'code' => 'MU',
                'dial_code' => '230',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            78 => 
            array (
                'id' => 79,
                'name_en' => 'New Caledonia',
                'name_ar' => 'كاليدونيا الجديدة',
                'code' => 'NC',
                'dial_code' => '687',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            79 => 
            array (
                'id' => 80,
                'name_en' => 'Guadeloupe',
                'name_ar' => 'جوادلوب',
                'code' => 'GP',
                'dial_code' => '590',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            80 => 
            array (
                'id' => 81,
                'name_en' => 'Kiribati',
                'name_ar' => 'كيريباتي',
                'code' => 'KI',
                'dial_code' => '686',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2023-12-24 16:05:04',
            ),
            81 => 
            array (
                'id' => 82,
                'name_en' => 'Jersey',
                'name_ar' => 'جيرسي',
                'code' => 'JE',
                'dial_code' => '+44-1534',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            82 => 
            array (
                'id' => 83,
                'name_en' => 'Liechtenstein',
                'name_ar' => 'ليختنشتاين',
                'code' => 'LI',
                'dial_code' => '423',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            83 => 
            array (
                'id' => 84,
                'name_en' => 'Greece',
                'name_ar' => 'اليونان',
                'code' => 'GR',
                'dial_code' => '30',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            84 => 
            array (
                'id' => 85,
                'name_en' => 'Hungary',
                'name_ar' => 'هنغاريا',
                'code' => 'HU',
                'dial_code' => '36',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            85 => 
            array (
                'id' => 86,
                'name_en' => 'Iceland',
                'name_ar' => 'أيسلندا',
                'code' => 'IS',
                'dial_code' => '354',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            86 => 
            array (
                'id' => 87,
                'name_en' => 'Gibraltar',
                'name_ar' => 'جبل طارق',
                'code' => 'GI',
                'dial_code' => '350',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            87 => 
            array (
                'id' => 88,
                'name_en' => 'Luxembourg',
                'name_ar' => 'لوكسمبورغ',
                'code' => 'LU',
                'dial_code' => '352',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            88 => 
            array (
                'id' => 89,
                'name_en' => 'Mauritania',
                'name_ar' => 'موريتانيا',
                'code' => 'MR',
                'dial_code' => '222',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            89 => 
            array (
                'id' => 90,
                'name_en' => 'Micronesia',
                'name_ar' => 'ولايات ميكرونيزيا الموحدة',
                'code' => 'FM',
                'dial_code' => '691',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            90 => 
            array (
                'id' => 91,
                'name_en' => 'Grenada',
                'name_ar' => 'غرينادا',
                'code' => 'GD',
                'dial_code' => '+1-473',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            91 => 
            array (
                'id' => 92,
                'name_en' => 'Greenland',
                'name_ar' => 'الأرض الخضراء',
                'code' => 'GL',
                'dial_code' => '299',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            92 => 
            array (
                'id' => 93,
                'name_en' => 'Jamaica',
                'name_ar' => 'جامايكا',
                'code' => 'JM',
                'dial_code' => '+1-876',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            93 => 
            array (
                'id' => 94,
                'name_en' => 'Macau S.A.R.',
                'name_ar' => 'ماكاو',
                'code' => 'MO',
                'dial_code' => '853',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            94 => 
            array (
                'id' => 95,
                'name_en' => 'Mayotte',
                'name_ar' => 'مايوت',
                'code' => 'YT',
                'dial_code' => '262',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            95 => 
            array (
                'id' => 96,
                'name_en' => 'Netherlands',
                'name_ar' => 'هولندا',
                'code' => 'NL',
                'dial_code' => '31',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            96 => 
            array (
                'id' => 97,
                'name_en' => 'Cyprus',
                'name_ar' => 'قبرص',
                'code' => 'CY',
                'dial_code' => '357',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            97 => 
            array (
                'id' => 98,
                'name_en' => 'Belize',
                'name_ar' => 'بليز',
                'code' => 'BZ',
                'dial_code' => '501',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            98 => 
            array (
                'id' => 99,
                'name_en' => 'Cayman Islands',
                'name_ar' => 'جزر كايمان',
                'code' => 'KY',
                'dial_code' => '+1-345',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            99 => 
            array (
                'id' => 100,
                'name_en' => 'French Guiana',
                'name_ar' => 'غيانا الفرنسية',
                'code' => 'GF',
                'dial_code' => '594',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            100 => 
            array (
                'id' => 101,
                'name_en' => 'Democratic Republic of the Congo',
                'name_ar' => 'الكونغو ، جمهورية الكونغو الديمقراطية',
                'code' => 'CD',
                'dial_code' => '243',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            101 => 
            array (
                'id' => 102,
                'name_en' => 'Finland',
                'name_ar' => 'فنلندا',
                'code' => 'FI',
                'dial_code' => '358',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            102 => 
            array (
                'id' => 103,
                'name_en' => 'France',
                'name_ar' => 'فرنسا',
                'code' => 'FR',
                'dial_code' => '33',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            103 => 
            array (
                'id' => 104,
                'name_en' => 'Cook Islands',
                'name_ar' => 'جزر كوك',
                'code' => 'CK',
                'dial_code' => '682',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            104 => 
            array (
                'id' => 105,
                'name_en' => 'French Southern Territories',
                'name_ar' => 'المناطق الجنوبية لفرنسا',
                'code' => 'TF',
                'dial_code' => '262',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            105 => 
            array (
                'id' => 106,
                'name_en' => 'Barbados',
                'name_ar' => 'بربادوس',
                'code' => 'BB',
                'dial_code' => '+1-246',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            106 => 
            array (
                'id' => 107,
                'name_en' => 'Dominica',
                'name_ar' => 'دومينيكا',
                'code' => 'DM',
                'dial_code' => '+1-767',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            107 => 
            array (
                'id' => 108,
                'name_en' => 'French Polynesia',
                'name_ar' => 'بولينيزيا الفرنسية',
                'code' => 'PF',
                'dial_code' => '689',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            108 => 
            array (
                'id' => 109,
                'name_en' => 'Czech Republic',
                'name_ar' => 'الجمهورية التشيكية',
                'code' => 'CZ',
                'dial_code' => '420',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            109 => 
            array (
                'id' => 110,
                'name_en' => 'Austria',
                'name_ar' => 'النمسا',
                'code' => 'AT',
                'dial_code' => '43',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            110 => 
            array (
                'id' => 111,
                'name_en' => 'Denmark',
                'name_ar' => 'الدنمارك',
                'code' => 'DK',
                'dial_code' => '45',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            111 => 
            array (
                'id' => 112,
                'name_en' => 'Antigua And Barbuda',
                'name_ar' => 'أنتيغوا وبربودا',
                'code' => 'AG',
                'dial_code' => '+1-268',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            112 => 
            array (
                'id' => 113,
                'name_en' => 'Bermuda',
                'name_ar' => 'برمودا',
                'code' => 'BM',
                'dial_code' => '+1-441',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            113 => 
            array (
                'id' => 114,
                'name_en' => 'Bonaire, Sint Eustatius and Saba',
                'name_ar' => 'بونير وسانت يوستاتيوس وسابا',
                'code' => 'BQ',
                'dial_code' => '599',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            114 => 
            array (
                'id' => 115,
                'name_en' => 'Belgium',
                'name_ar' => 'بلجيكا',
                'code' => 'BE',
                'dial_code' => '32',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            115 => 
            array (
                'id' => 116,
                'name_en' => 'Armenia',
                'name_ar' => 'أرمينيا',
                'code' => 'AM',
                'dial_code' => '374',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            116 => 
            array (
                'id' => 117,
                'name_en' => 'Aruba',
                'name_ar' => 'أروبا',
                'code' => 'AW',
                'dial_code' => '297',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            117 => 
            array (
                'id' => 118,
                'name_en' => 'Central African Republic',
                'name_ar' => 'جمهورية افريقيا الوسطى',
                'code' => 'CF',
                'dial_code' => '236',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            118 => 
            array (
                'id' => 119,
                'name_en' => 'Curaçao',
                'name_ar' => 'كوراكاو',
                'code' => 'CW',
                'dial_code' => '599',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            119 => 
            array (
                'id' => 120,
                'name_en' => 'Falkland Islands',
            'name_ar' => 'جزر فوكلاند (مالفيناس)',
                'code' => 'FK',
                'dial_code' => '500',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            120 => 
            array (
                'id' => 121,
                'name_en' => 'Bouvet Island',
                'name_ar' => 'جزيرة بوفيت',
                'code' => 'BV',
                'dial_code' => '0055',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            121 => 
            array (
                'id' => 122,
                'name_en' => 'Australia',
                'name_ar' => 'أستراليا',
                'code' => 'AU',
                'dial_code' => '61',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            122 => 
            array (
                'id' => 123,
                'name_en' => 'British Indian Ocean Territory',
                'name_ar' => 'إقليم المحيط البريطاني الهندي',
                'code' => 'IO',
                'dial_code' => '246',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            123 => 
            array (
                'id' => 124,
                'name_en' => 'Bahrain',
                'name_ar' => 'البحرين',
                'code' => 'BH',
                'dial_code' => '973',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            124 => 
            array (
                'id' => 125,
                'name_en' => 'Bulgaria',
                'name_ar' => 'بلغاريا',
                'code' => 'BG',
                'dial_code' => '359',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            125 => 
            array (
                'id' => 126,
            'name_en' => 'Cocos (Keeling) Islands',
            'name_ar' => 'جزر كوكوس (كيلينغ)',
                'code' => 'CC',
                'dial_code' => '61',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            126 => 
            array (
                'id' => 127,
                'name_en' => 'Comoros',
                'name_ar' => 'جزر القمر',
                'code' => 'KM',
                'dial_code' => '269',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            127 => 
            array (
                'id' => 128,
                'name_en' => 'Croatia',
                'name_ar' => 'كرواتيا',
                'code' => 'HR',
                'dial_code' => '385',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            128 => 
            array (
                'id' => 129,
                'name_en' => 'Fiji Islands',
                'name_ar' => 'فيجي',
                'code' => 'FJ',
                'dial_code' => '679',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            129 => 
            array (
                'id' => 130,
                'name_en' => 'Brunei',
                'name_ar' => 'بروناي دار السلام',
                'code' => 'BN',
                'dial_code' => '673',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            130 => 
            array (
                'id' => 131,
                'name_en' => 'Bosnia and Herzegovina',
                'name_ar' => 'البوسنة والهرسك',
                'code' => 'BA',
                'dial_code' => '387',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            131 => 
            array (
                'id' => 132,
                'name_en' => 'Canada',
                'name_ar' => 'كندا',
                'code' => 'CA',
                'dial_code' => '1',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            132 => 
            array (
                'id' => 133,
                'name_en' => 'East Timor',
                'name_ar' => 'تيمور ليشتي',
                'code' => 'TL',
                'dial_code' => '670',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            133 => 
            array (
                'id' => 134,
                'name_en' => 'Cape Verde',
                'name_ar' => 'الرأس الأخضر',
                'code' => 'CV',
                'dial_code' => '238',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            134 => 
            array (
                'id' => 135,
                'name_en' => 'Faroe Islands',
                'name_ar' => 'جزر فاروس',
                'code' => 'FO',
                'dial_code' => '298',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            135 => 
            array (
                'id' => 136,
                'name_en' => 'Christmas Island',
                'name_ar' => 'جزيرة الكريسماس',
                'code' => 'CX',
                'dial_code' => '61',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            136 => 
            array (
                'id' => 137,
                'name_en' => 'Antarctica',
                'name_ar' => 'أنتاركتيكا',
                'code' => 'AQ',
                'dial_code' => '672',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            137 => 
            array (
                'id' => 138,
                'name_en' => 'Albania',
                'name_ar' => 'ألبانيا',
                'code' => 'AL',
                'dial_code' => '355',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            138 => 
            array (
                'id' => 139,
                'name_en' => 'Aland Islands',
                'name_ar' => 'جزر آلاند',
                'code' => 'AX',
                'dial_code' => '+358-18',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            139 => 
            array (
                'id' => 140,
                'name_en' => 'Anguilla',
                'name_ar' => 'أنغيلا',
                'code' => 'AI',
                'dial_code' => '+1-264',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            140 => 
            array (
                'id' => 141,
                'name_en' => 'American Samoa',
                'name_ar' => 'ساموا الأمريكية',
                'code' => 'AS',
                'dial_code' => '+1-684',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            141 => 
            array (
                'id' => 142,
                'name_en' => 'Andorra',
                'name_ar' => 'أندورا',
                'code' => 'AD',
                'dial_code' => '376',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            142 => 
            array (
                'id' => 143,
                'name_en' => 'Thailand',
                'name_ar' => 'تايلاند',
                'code' => 'TH',
                'dial_code' => '66',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            143 => 
            array (
                'id' => 144,
                'name_en' => 'Trinidad And Tobago',
                'name_ar' => 'ترينداد وتوباغو',
                'code' => 'TT',
                'dial_code' => '+1-868',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            144 => 
            array (
                'id' => 145,
                'name_en' => 'Yemen',
                'name_ar' => 'اليمن',
                'code' => 'YE',
                'dial_code' => '967',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            145 => 
            array (
                'id' => 146,
                'name_en' => 'Tunisia',
                'name_ar' => 'تونس',
                'code' => 'TN',
                'dial_code' => '216',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            146 => 
            array (
                'id' => 147,
                'name_en' => 'Zambia',
                'name_ar' => 'زامبيا',
                'code' => 'ZM',
                'dial_code' => '260',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            147 => 
            array (
                'id' => 148,
                'name_en' => 'Togo',
                'name_ar' => 'توجو',
                'code' => 'TG',
                'dial_code' => '228',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            148 => 
            array (
                'id' => 149,
                'name_en' => 'Vietnam',
                'name_ar' => 'فييت نام',
                'code' => 'VN',
                'dial_code' => '84',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            149 => 
            array (
                'id' => 150,
                'name_en' => 'Zimbabwe',
                'name_ar' => 'زيمبابوي',
                'code' => 'ZW',
                'dial_code' => '263',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            150 => 
            array (
                'id' => 151,
                'name_en' => 'Uzbekistan',
                'name_ar' => 'أوزبكستان',
                'code' => 'UZ',
                'dial_code' => '998',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            151 => 
            array (
                'id' => 152,
                'name_en' => 'Turkey',
                'name_ar' => 'تركيا',
                'code' => 'TR',
                'dial_code' => '90',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            152 => 
            array (
                'id' => 153,
                'name_en' => 'Ukraine',
                'name_ar' => 'أوكرانيا',
                'code' => 'UA',
                'dial_code' => '380',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            153 => 
            array (
                'id' => 154,
                'name_en' => 'Venezuela',
                'name_ar' => 'فنزويلا',
                'code' => 'VE',
                'dial_code' => '58',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            154 => 
            array (
                'id' => 155,
                'name_en' => 'Uruguay',
                'name_ar' => 'أوروغواي',
                'code' => 'UY',
                'dial_code' => '598',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            155 => 
            array (
                'id' => 156,
                'name_en' => 'Uganda',
                'name_ar' => 'أوغندا',
                'code' => 'UG',
                'dial_code' => '256',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            156 => 
            array (
                'id' => 157,
                'name_en' => 'South Sudan',
                'name_ar' => 'جنوب السودان',
                'code' => 'SS',
                'dial_code' => '211',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            157 => 
            array (
                'id' => 158,
                'name_en' => 'Sierra Leone',
                'name_ar' => 'سيرا ليون',
                'code' => 'SL',
                'dial_code' => '232',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            158 => 
            array (
                'id' => 159,
                'name_en' => 'Senegal',
                'name_ar' => 'السنغال',
                'code' => 'SN',
                'dial_code' => '221',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            159 => 
            array (
                'id' => 160,
                'name_en' => 'Seychelles',
                'name_ar' => 'سيشيل',
                'code' => 'SC',
                'dial_code' => '248',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            160 => 
            array (
                'id' => 161,
                'name_en' => 'Somalia',
                'name_ar' => 'الصومال',
                'code' => 'SO',
                'dial_code' => '252',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            161 => 
            array (
                'id' => 162,
                'name_en' => 'Singapore',
                'name_ar' => 'سنغافورة',
                'code' => 'SG',
                'dial_code' => '65',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            162 => 
            array (
                'id' => 163,
                'name_en' => 'South Africa',
                'name_ar' => 'جنوب أفريقيا',
                'code' => 'ZA',
                'dial_code' => '27',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            163 => 
            array (
                'id' => 164,
                'name_en' => 'South Korea',
                'name_ar' => 'جمهورية كوريا',
                'code' => 'KR',
                'dial_code' => '82',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            164 => 
            array (
                'id' => 165,
                'name_en' => 'Tanzania',
                'name_ar' => 'جمهورية تنزانيا المتحدة',
                'code' => 'TZ',
                'dial_code' => '255',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            165 => 
            array (
                'id' => 166,
                'name_en' => 'Sudan',
                'name_ar' => 'السودان',
                'code' => 'SD',
                'dial_code' => '249',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            166 => 
            array (
                'id' => 167,
                'name_en' => 'Swaziland',
                'name_ar' => 'سوازيلاند',
                'code' => 'SZ',
                'dial_code' => '268',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            167 => 
            array (
                'id' => 168,
                'name_en' => 'Tajikistan',
                'name_ar' => 'طاجيكستان',
                'code' => 'TJ',
                'dial_code' => '992',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            168 => 
            array (
                'id' => 169,
                'name_en' => 'Sri Lanka',
                'name_ar' => 'سيريلانكا',
                'code' => 'LK',
                'dial_code' => '94',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            169 => 
            array (
                'id' => 170,
                'name_en' => 'Peru',
                'name_ar' => 'بيرو',
                'code' => 'PE',
                'dial_code' => '51',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            170 => 
            array (
                'id' => 171,
                'name_en' => 'Philippines',
                'name_ar' => 'الفيلبين',
                'code' => 'PH',
                'dial_code' => '63',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            171 => 
            array (
                'id' => 172,
                'name_en' => 'Nigeria',
                'name_ar' => 'نيجيريا',
                'code' => 'NG',
                'dial_code' => '234',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            172 => 
            array (
                'id' => 173,
                'name_en' => 'Paraguay',
                'name_ar' => 'باراغواي',
                'code' => 'PY',
                'dial_code' => '595',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            173 => 
            array (
                'id' => 174,
                'name_en' => 'Niger',
                'name_ar' => 'النيجر',
                'code' => 'NE',
                'dial_code' => '227',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            174 => 
            array (
                'id' => 175,
                'name_en' => 'Pakistan',
                'name_ar' => 'باكستان',
                'code' => 'PK',
                'dial_code' => '92',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            175 => 
            array (
                'id' => 176,
                'name_en' => 'Nepal',
                'name_ar' => 'نيبال',
                'code' => 'NP',
                'dial_code' => '977',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            176 => 
            array (
                'id' => 177,
                'name_en' => 'Oman',
                'name_ar' => 'سلطنة عمان',
                'code' => 'OM',
                'dial_code' => '968',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            177 => 
            array (
                'id' => 178,
                'name_en' => 'Papua new Guinea',
                'name_ar' => 'بابوا غينيا الجديدة',
                'code' => 'PG',
                'dial_code' => '675',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            178 => 
            array (
                'id' => 179,
                'name_en' => 'Namibia',
                'name_ar' => 'ناميبيا',
                'code' => 'NA',
                'dial_code' => '264',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            179 => 
            array (
                'id' => 180,
                'name_en' => 'Palestinian Territory Occupied',
                'name_ar' => 'الأراضي الفلسطينية المحتلة',
                'code' => 'PS',
                'dial_code' => '970',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            180 => 
            array (
                'id' => 181,
                'name_en' => 'Rwanda',
                'name_ar' => 'رواندا',
                'code' => 'RW',
                'dial_code' => '250',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            181 => 
            array (
                'id' => 182,
                'name_en' => 'Russia',
                'name_ar' => 'الاتحاد الروسي',
                'code' => 'RU',
                'dial_code' => '7',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            182 => 
            array (
                'id' => 183,
                'name_en' => 'Mozambique',
                'name_ar' => 'موزمبيق',
                'code' => 'MZ',
                'dial_code' => '258',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            183 => 
            array (
                'id' => 184,
                'name_en' => 'Myanmar',
                'name_ar' => 'ميانمار',
                'code' => 'MM',
                'dial_code' => '95',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            184 => 
            array (
                'id' => 185,
                'name_en' => 'Puerto Rico',
                'name_ar' => 'بورتوريكو',
                'code' => 'PR',
                'dial_code' => '+1-787 and 1-939',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            185 => 
            array (
                'id' => 186,
                'name_en' => 'Lesotho',
                'name_ar' => 'ليسوتو',
                'code' => 'LS',
                'dial_code' => '266',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            186 => 
            array (
                'id' => 187,
                'name_en' => 'Madagascar',
                'name_ar' => 'مدغشقر',
                'code' => 'MG',
                'dial_code' => '261',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            187 => 
            array (
                'id' => 188,
                'name_en' => 'Liberia',
                'name_ar' => 'ليبيريا',
                'code' => 'LR',
                'dial_code' => '231',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            188 => 
            array (
                'id' => 189,
                'name_en' => 'Moldova',
                'name_ar' => 'جمهورية مولدوفا',
                'code' => 'MD',
                'dial_code' => '373',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            189 => 
            array (
                'id' => 190,
                'name_en' => 'Mexico',
                'name_ar' => 'المكسيك',
                'code' => 'MX',
                'dial_code' => '52',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            190 => 
            array (
                'id' => 191,
                'name_en' => 'Mongolia',
                'name_ar' => 'منغوليا',
                'code' => 'MN',
                'dial_code' => '976',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            191 => 
            array (
                'id' => 192,
                'name_en' => 'Latvia',
                'name_ar' => 'لاتفيا',
                'code' => 'LV',
                'dial_code' => '371',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            192 => 
            array (
                'id' => 193,
                'name_en' => 'Malaysia',
                'name_ar' => 'ماليزيا',
                'code' => 'MY',
                'dial_code' => '60',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            193 => 
            array (
                'id' => 194,
                'name_en' => 'Morocco',
                'name_ar' => 'المغرب',
                'code' => 'MA',
                'dial_code' => '212',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            194 => 
            array (
                'id' => 195,
                'name_en' => 'Mali',
                'name_ar' => 'مالي',
                'code' => 'ML',
                'dial_code' => '223',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            195 => 
            array (
                'id' => 196,
                'name_en' => 'Kenya',
                'name_ar' => 'كينيا',
                'code' => 'KE',
                'dial_code' => '254',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            196 => 
            array (
                'id' => 197,
                'name_en' => 'Lebanon',
                'name_ar' => 'لبنان',
                'code' => 'LB',
                'dial_code' => '961',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            197 => 
            array (
                'id' => 198,
                'name_en' => 'Libya',
                'name_ar' => 'الجماهيرية العربية الليبية',
                'code' => 'LY',
                'dial_code' => '218',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            198 => 
            array (
                'id' => 199,
                'name_en' => 'Kyrgyzstan',
                'name_ar' => 'قيرغيزستان',
                'code' => 'KG',
                'dial_code' => '996',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            199 => 
            array (
                'id' => 200,
                'name_en' => 'Laos',
                'name_ar' => 'جمهورية لاو الديمقراطية الشعبية',
                'code' => 'LA',
                'dial_code' => '856',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            200 => 
            array (
                'id' => 201,
                'name_en' => 'Lithuania',
                'name_ar' => 'ليتوانيا',
                'code' => 'LT',
                'dial_code' => '370',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            201 => 
            array (
                'id' => 202,
                'name_en' => 'Hong Kong S.A.R.',
                'name_ar' => 'هونج كونج',
                'code' => 'HK',
                'dial_code' => '852',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            202 => 
            array (
                'id' => 203,
                'name_en' => 'Gabon',
                'name_ar' => 'الجابون',
                'code' => 'GA',
                'dial_code' => '241',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            203 => 
            array (
                'id' => 204,
                'name_en' => 'Iran',
                'name_ar' => 'جمهورية إيران الإسلامية',
                'code' => 'IR',
                'dial_code' => '98',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            204 => 
            array (
                'id' => 205,
                'name_en' => 'Jordan',
                'name_ar' => 'الأردن',
                'code' => 'JO',
                'dial_code' => '962',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            205 => 
            array (
                'id' => 206,
                'name_en' => 'Kazakhstan',
                'name_ar' => 'كازاخستان',
                'code' => 'KZ',
                'dial_code' => '7',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            206 => 
            array (
                'id' => 207,
                'name_en' => 'India',
                'name_ar' => 'الهند',
                'code' => 'IN',
                'dial_code' => '91',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            207 => 
            array (
                'id' => 208,
                'name_en' => 'Estonia',
                'name_ar' => 'إستونيا',
                'code' => 'EE',
                'dial_code' => '372',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            208 => 
            array (
                'id' => 209,
                'name_en' => 'Ethiopia',
                'name_ar' => 'أثيوبيا',
                'code' => 'ET',
                'dial_code' => '251',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            209 => 
            array (
                'id' => 210,
                'name_en' => 'Indonesia',
                'name_ar' => 'إندونيسيا',
                'code' => 'ID',
                'dial_code' => '62',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            210 => 
            array (
                'id' => 211,
                'name_en' => 'Honduras',
                'name_ar' => 'هندوراس',
                'code' => 'HN',
                'dial_code' => '504',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            211 => 
            array (
                'id' => 212,
                'name_en' => 'Gambia The',
                'name_ar' => 'غامبيا',
                'code' => 'GM',
                'dial_code' => '220',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            212 => 
            array (
                'id' => 213,
                'name_en' => 'Georgia',
                'name_ar' => 'جورجيا',
                'code' => 'GE',
                'dial_code' => '995',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            213 => 
            array (
                'id' => 214,
                'name_en' => 'Guatemala',
                'name_ar' => 'غواتيمالا',
                'code' => 'GT',
                'dial_code' => '502',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            214 => 
            array (
                'id' => 215,
                'name_en' => 'Haiti',
                'name_ar' => 'هايتي',
                'code' => 'HT',
                'dial_code' => '509',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            215 => 
            array (
                'id' => 216,
                'name_en' => 'Ghana',
                'name_ar' => 'غانا',
                'code' => 'GH',
                'dial_code' => '233',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            216 => 
            array (
                'id' => 217,
                'name_en' => 'Iraq',
                'name_ar' => 'العراق',
                'code' => 'IQ',
                'dial_code' => '964',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            217 => 
            array (
                'id' => 218,
                'name_en' => 'Guinea',
                'name_ar' => 'غينيا',
                'code' => 'GN',
                'dial_code' => '224',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            218 => 
            array (
                'id' => 219,
                'name_en' => 'Equatorial Guinea',
                'name_ar' => 'غينيا الإستوائية',
                'code' => 'GQ',
                'dial_code' => '240',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            219 => 
            array (
                'id' => 220,
                'name_en' => 'China',
                'name_ar' => 'الصين',
                'code' => 'CN',
                'dial_code' => '86',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            220 => 
            array (
                'id' => 221,
                'name_en' => 'Eritrea',
                'name_ar' => 'إريتريا',
                'code' => 'ER',
                'dial_code' => '291',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            221 => 
            array (
                'id' => 222,
                'name_en' => 'Cuba',
                'name_ar' => 'كوبا',
                'code' => 'CU',
                'dial_code' => '53',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            222 => 
            array (
                'id' => 223,
                'name_en' => 'Costa Rica',
                'name_ar' => 'كوستا ريكا',
                'code' => 'CR',
                'dial_code' => '506',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            223 => 
            array (
                'id' => 224,
                'name_en' => 'Djibouti',
                'name_ar' => 'جيبوتي',
                'code' => 'DJ',
                'dial_code' => '253',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            224 => 
            array (
                'id' => 225,
                'name_en' => 'El Salvador',
                'name_ar' => 'السلفادور',
                'code' => 'SV',
                'dial_code' => '503',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            225 => 
            array (
                'id' => 226,
                'name_en' => 'Egypt',
                'name_ar' => 'مصر',
                'code' => 'EG',
                'dial_code' => '20',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            226 => 
            array (
                'id' => 227,
                'name_en' => 'Congo',
                'name_ar' => 'الكونغو',
                'code' => 'CG',
                'dial_code' => '242',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            227 => 
            array (
                'id' => 228,
                'name_en' => 'Dominican Republic',
                'name_ar' => 'جمهورية الدومنيكان',
                'code' => 'DO',
                'dial_code' => '+1-809 and 1-829',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            228 => 
            array (
                'id' => 229,
                'name_en' => 'Ecuador',
                'name_ar' => 'الاكوادور',
                'code' => 'EC',
                'dial_code' => '593',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            229 => 
            array (
                'id' => 230,
                'name_en' => 'Chile',
                'name_ar' => 'تشيلي',
                'code' => 'CL',
                'dial_code' => '56',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            230 => 
            array (
                'id' => 231,
                'name_en' => 'Colombia',
                'name_ar' => 'كولومبيا',
                'code' => 'CO',
                'dial_code' => '57',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            231 => 
            array (
                'id' => 232,
            'name_en' => 'Cote D\'Ivoire (Ivory Coast)',
                'name_ar' => 'ساحل العاج',
                'code' => 'CI',
                'dial_code' => '225',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            232 => 
            array (
                'id' => 233,
                'name_en' => 'Bangladesh',
                'name_ar' => 'بنغلاديش',
                'code' => 'BD',
                'dial_code' => '880',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            233 => 
            array (
                'id' => 234,
                'name_en' => 'Bolivia',
                'name_ar' => 'بوليفيا',
                'code' => 'BO',
                'dial_code' => '591',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            234 => 
            array (
                'id' => 235,
                'name_en' => 'Cambodia',
                'name_ar' => 'كمبوديا',
                'code' => 'KH',
                'dial_code' => '855',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            235 => 
            array (
                'id' => 236,
                'name_en' => 'Burkina Faso',
                'name_ar' => 'بوركينا فاسو',
                'code' => 'BF',
                'dial_code' => '226',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            236 => 
            array (
                'id' => 237,
                'name_en' => 'Burundi',
                'name_ar' => 'بوروندي',
                'code' => 'BI',
                'dial_code' => '257',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            237 => 
            array (
                'id' => 238,
                'name_en' => 'Benin',
                'name_ar' => 'بنين',
                'code' => 'BJ',
                'dial_code' => '229',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            238 => 
            array (
                'id' => 239,
                'name_en' => 'Botswana',
                'name_ar' => 'بوتسوانا',
                'code' => 'BW',
                'dial_code' => '267',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            239 => 
            array (
                'id' => 240,
                'name_en' => 'Bhutan',
                'name_ar' => 'بوتان',
                'code' => 'BT',
                'dial_code' => '975',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            240 => 
            array (
                'id' => 241,
                'name_en' => 'Chad',
                'name_ar' => 'تشاد',
                'code' => 'TD',
                'dial_code' => '235',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            241 => 
            array (
                'id' => 242,
                'name_en' => 'Cameroon',
                'name_ar' => 'الكاميرون',
                'code' => 'CM',
                'dial_code' => '237',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            242 => 
            array (
                'id' => 243,
                'name_en' => 'Brazil',
                'name_ar' => 'البرازيل',
                'code' => 'BR',
                'dial_code' => '55',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            243 => 
            array (
                'id' => 244,
                'name_en' => 'Belarus',
                'name_ar' => 'بيلاروسيا',
                'code' => 'BY',
                'dial_code' => '375',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            244 => 
            array (
                'id' => 245,
                'name_en' => 'Argentina',
                'name_ar' => 'الأرجنتين',
                'code' => 'AR',
                'dial_code' => '54',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            245 => 
            array (
                'id' => 246,
                'name_en' => 'Afghanistan',
                'name_ar' => 'أفغانستان',
                'code' => 'AF',
                'dial_code' => '93',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            246 => 
            array (
                'id' => 247,
                'name_en' => 'Angola',
                'name_ar' => 'أنغولا',
                'code' => 'AO',
                'dial_code' => '244',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            247 => 
            array (
                'id' => 248,
                'name_en' => 'Algeria',
                'name_ar' => 'الجزائر',
                'code' => 'DZ',
                'dial_code' => '213',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
            248 => 
            array (
                'id' => 249,
                'name_en' => 'Azerbaijan',
                'name_ar' => 'أذربيجان',
                'code' => 'AZ',
                'dial_code' => '994',
                'created_at' => '2023-12-24 14:22:01',
                'updated_at' => '2024-04-02 00:28:09',
            ),
        ));
        
        
    }
}