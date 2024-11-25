<?php

use App\Enums\UserPointsCases;

return [
    /*
    |--------------------------------------------------------------------------
    | This config file is used to controll points system
    |--------------------------------------------------------------------------
    | Note that you should not add negative values as it's already
    | handled using the deletePoints service.
    |
    | Note2 : All of the cases are from UserPointsEnum
    |
    */

    /*
    |--------------------------------------------------------------------------
    | One Time Points
    |--------------------------------------------------------------------------
    | Those points are given to users only for one time
    |
    */

    UserPointsCases::PROFILE_IMAGE->value     => 5,
    UserPointsCases::BG_IMAGE->value          => 5,
    UserPointsCases::VERIFY_EMAIL->value      => 5,

    /*
    |--------------------------------------------------------------------------
    | Rating points
    |--------------------------------------------------------------------------
    | Giving points depending on the average rate the user received
    |
    */

    UserPointsCases::FOUR_STARS_PLUS->value     => 20,
    UserPointsCases::THREE_STARS_PLUS->value    => 10,
    UserPointsCases::TWO_STARS_PLUS->value      => 5,
    UserPointsCases::TWO_STARS_LESS->value      => -5,

    /*
    |--------------------------------------------------------------------------
    | Ban
    |--------------------------------------------------------------------------
    | Giving points by ban system
    |
    */

    UserPointsCases::AUTO_BAN->value    => -20,
    UserPointsCases::BAN->value         => -40,
];