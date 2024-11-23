<?php

namespace App\Filament\Resources\Users\UserResource\Pages;

use App\Filament\Resources\Users\LoginHistoryResource;
use App\Filament\Resources\Users\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

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
