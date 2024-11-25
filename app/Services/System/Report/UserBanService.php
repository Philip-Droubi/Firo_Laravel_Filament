<?php

namespace App\Services\System\Report;

use App\Enums\UserPointsCases;
use App\Models\Administration\Log\BanLog;
use App\Models\User;
use App\Services\MainService;
use App\Services\Users\Account\UserPointService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class UserBanService.
 */
class UserBanService extends MainService
{
    private $pointService;

    public function __construct()
    {
        $this->pointService = new UserPointService();
    }

    public function ban($data, $record): bool
    {
        DB::beginTransaction();

        $user = User::where("account_name", $record->account_name)->with('profile')->first();
        $profile = $user->profile;

        $noBanToBan = false; //To check if user already banned then this is ban update or it's first time ban
        if (!$profile->banned_until) $noBanToBan = true;

        $profile->banned_until = Carbon::parse($data["banned_until"])->format("Y-m-d H:i");
        // $user->tokens()->delete();
        $profile->save();

        BanLog::create([
            "banned_id" => $user->id,
            "banned_by_id" => auth()->id(),
            "reason" => $data["reason"],
            "banned_until" => Carbon::parse($profile->banned_until)->format("Y-m-d H:i"),
            "is_auto" => false,
        ]);
        $noBanToBan ? $this->pointService->addPoints($user->id, UserPointsCases::BAN->value):null;

        DB::commit();
        //Send Email & Notification
        return true;
    }

    public function unBan($account_name)
    {
        DB::beginTransaction();
        $user = User::withWhereHas("profile", function ($query) {
            $query->whereNotNull("banned_until");
        })
            ->where(["account_name" => $account_name, "role_id" => 3])->firstOrFail();
        $user->profile->banned_until = null;
        $user->profile->save();
        DB::commit();
        //Send Email & Notification
        return true;
    }
}
