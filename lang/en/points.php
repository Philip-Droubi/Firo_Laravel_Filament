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

    UserPointsCases::PROFILE_IMAGE->value       => "Add a profile image",
    UserPointsCases::BG_IMAGE->value            => "Add a background image",
    UserPointsCases::VERIFY_EMAIL->value        => "Verified your email",

    UserPointsCases::FOUR_STARS_PLUS->value     => "Received a rating higher than 4 stars",
    UserPointsCases::THREE_STARS_PLUS->value    => "Received a rating higher than 3 stars",
    UserPointsCases::TWO_STARS_PLUS->value      => "Received a rating higher than 2 stars",
    UserPointsCases::TWO_STARS_LESS->value      => "Received a rating less than 2 stars",

    UserPointsCases::AUTO_BAN->value     => "Auto ban case",
    UserPointsCases::BAN->value          => "Ban case",
];