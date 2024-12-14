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
    ReportableTypes::PROFILE->value => "Users profiles",
    ReportableTypes::USER_SERVICE->value => "Users services",
    ReportableTypes::CUSTOMER_SERVICE_CARD->value => "Customer service cards",

    "Unknown" => "Unknown",
    ReportableTypes::PROFILE->value . " case" => "Report on user account",
    ReportableTypes::USER_SERVICE->value . " case" => "Report on user service",
    ReportableTypes::CUSTOMER_SERVICE_CARD->value . " case" => "Report on customer service card",

    ":name profile" => ":name profile",
    ":name user service" => "user service: :name",
    ":name customer service card" => "Customer service card: :name",
];