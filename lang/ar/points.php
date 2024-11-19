<?php

use App\Enums\UserPointsCases;

return [

    /*
    |--------------------------------------------------------------------------
    | User Points Cases Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the user points system
    | You are free to change them to anything you want to customize
    | these language lines according to your application's requirements.
    |
    */

    UserPointsCases::PROFILE_IMAGE->value       => "إضافة صورة شخصية",
    UserPointsCases::BG_IMAGE->value            => "إضافة صورة غلاف",
    UserPointsCases::VERIFY_EMAIL->value        => "تأكيد البريد الإلكتروني",

    UserPointsCases::FOUR_STARS_PLUS->value     => "تقييم بأكثر من 4 نجوم",
    UserPointsCases::THREE_STARS_PLUS->value    => "تقييم بأكثر من 3 نجوم",
    UserPointsCases::TWO_STARS_PLUS->value      => "تقييم بأكثر من نجمتين",
    UserPointsCases::TWO_STARS_LESS->value      => "تقييم بأقل من نجمتين",

    UserPointsCases::AUTO_BAN->value     => "لقد تمَّ حظرك آلياً",
    UserPointsCases::BAN->value          => "لقد تمَّ حظرك",
];