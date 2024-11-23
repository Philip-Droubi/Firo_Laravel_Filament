<?php

namespace App\Filament\Resources\Users\AdminResource\Pages;

use App\Filament\Resources\Users\AdminResource;
use App\Filament\Resources\Users\LoginHistoryResource;
use App\Models\Administration\Account\AdminProfile;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAdmin extends ViewRecord
{
    protected static string $resource = AdminResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['about_user'] = AdminProfile::where("user_id", $data["id"])->first(["about_user"])->about_user;

        $data["deactive_at"] ? $data["deactive_at_time"]  = Carbon::parse($data["deactive_at"])->translatedFormat('Y/m/d g:i a')
            : $data["deactive_at_time"] = __("keys.Account is active");

        $data["deactive_at"] ? $data["deactive_at_toggle"] = false
            : $data["deactive_at_toggle"] = true;

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make("login_history")
                ->url(fn($record): string => LoginHistoryResource::getUrl("index", ["user" => $record->account_name]))
                ->color("success")
                ->label(__("keys.login history"))
                ->translateLabel(),
        ];
    }
}
