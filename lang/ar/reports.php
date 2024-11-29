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

    "Unknown" => "غير محدد",
    ReportableTypes::PROFILE->value . " case" => "إبلاغ على حساب المستخدم",

    ":name profile" => "حساب :name",
];
