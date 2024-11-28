<?php

namespace App\Services\Administration\Auth;

use App\Services\MainService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

/**
 * Class AuthService.
 */
class AuthService extends MainService
{
    public function logoutAll(): bool
    {
        DB::beginTransaction();
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();
        DB::table('sessions')->where('user_id', $user->id)->delete();
        $user->fcmTokens()->delete();
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->flush();
        request()->session()->regenerateToken();
        DB::commit();
        return true;
    }
}
