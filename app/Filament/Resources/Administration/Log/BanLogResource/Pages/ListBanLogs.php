<?php

namespace App\Filament\Resources\Administration\Log\BanLogResource\Pages;

use App\Filament\Resources\Administration\Log\BanLogResource;
use App\Services\System\Report\UserBanService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListBanLogs extends ListRecords
{
    protected static string $resource = BanLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->createAnother(false)
                ->action(function ($data) {
                    (new UserBanService())->ban($data, $data["account_name"]);
                    Notification::make()
                        ->title(__("messages.user has been banned"))
                        ->warning()
                        ->send();
                })
                ->requiresConfirmation(),
        ];
    }
}
