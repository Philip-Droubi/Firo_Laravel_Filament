<?php

namespace App\Filament\Resources\Users\UserResource\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\Users\UserResource\RelationManagers\BansRelationManager;
use App\Filament\Resources\Users\UserResource\RelationManagers\LoginHistoryRelationManager;
use App\Filament\Resources\Users\UserResource\RelationManagers\PointsRelationManager;
use App\Models\Users\Account\UserProfile;
use App\Models\Users\Account\UserSkill;
use App\Traits\Actions\UserBanActions;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    use UserBanActions;
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {

        $userProfile = UserProfile::where("user_id", $data["id"])->first();

        $data += [
            'bio' => $userProfile->bio,
            'bg_img_url' => $userProfile->bg_img_url,
            'is_freelancer' => $userProfile->is_freelancer,
            'is_stakeholder' => $userProfile->is_stakeholder,
            'tfa' => $userProfile->TFA,
        ];

        $data["user_skills"] = UserSkill::query()->where('user_id', $data['id'])->pluck("skill")->toArray();

        $data["deactive_at"] ? $data["deactive_at_time"]  = Carbon::parse($data["deactive_at"])->translatedFormat('Y/m/d g:i a')
            : $data["deactive_at_time"] = __("keys.Account is active");

        $data["deactive_at"] ? $data["deactive_at_toggle"] = false
            : $data["deactive_at_toggle"] = true;

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            $this->banUser(),
            $this->unBanUser(),
        ];
    }

    public function getRelationManagers(): array
    {
        return [
            PointsRelationManager::class,
            LoginHistoryRelationManager::class,
            BansRelationManager::class,
        ];
    }
}
