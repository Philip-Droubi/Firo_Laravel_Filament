<?php

namespace App\Services\Users\Account;

use App\Enums\UserPointsCases;
use App\Models\Users\Account\UserPoint;
use App\Services\MainService;

class UserPointService extends MainService
{
    public function addPoints(int $user_id, string $case): bool
    {
        //Check if one-time points
        if (in_array(
            $case,
            [
                UserPointsCases::BG_IMAGE->value,
                UserPointsCases::PROFILE_IMAGE->value,
                UserPointsCases::VERIFY_EMAIL->value,
            ]
        )) {
            UserPoint::firstOrCreate([
                "user_id" => $user_id,
                "case" => $case,
            ], [
                "points" => config("userpoints.{$case}"),
            ]);
            return true;
        }

        UserPoint::create([
            "user_id" => $user_id,
            "points" =>  config("userpoints.{$case}"),
            "case" => $case,
        ]);
        return true;
    }
}