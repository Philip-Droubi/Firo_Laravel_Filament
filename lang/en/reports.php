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
    ReportableTypes::PROFILE->value => "User profiles",

    "Unknown" => "Unknown",
    ReportableTypes::PROFILE->value . " case" => "Report on user account",

    ":name profile" => ":name profile",
];
