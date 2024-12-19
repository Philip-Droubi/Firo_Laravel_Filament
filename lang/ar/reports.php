<?php

use App\Enums\FavorableTypes;
use App\Enums\ReportableTypes;

return [

    /*
    |--------------------------------------------------------------------------
    | App reporting messages Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during App for various
    | reporting messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    //Types
    ReportableTypes::PROFILE->value => "حسابات المستخدمين",
    ReportableTypes::USER_SERVICE->value => "خدمات المستخدمين",
    ReportableTypes::CUSTOMER_SERVICE_CARD->value => "بطاقات خدمة العملاء",

    "Unknown" => "غير محدد",
    ReportableTypes::PROFILE->value . " case" => "إبلاغ على حساب المستخدم",
    ReportableTypes::USER_SERVICE->value . " case" => "إبلاغ على خدمة خاصة بالمستخدم",
    ReportableTypes::CUSTOMER_SERVICE_CARD->value . " case" => "إبلاغ على بطاقة خدمة عملاء",

    ":name profile" => "حساب :name",
    ":name user service" => "خدمة باسم :name",
    ":title customer service card" => "بطاقة خدمة عملاء بعنوان :title",
];