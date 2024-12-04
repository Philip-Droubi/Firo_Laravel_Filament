<?php

namespace App\Filament\Resources\Users\Service\UserServiceResource\Pages;

use App\Filament\Resources\Users\Service\UserServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserService extends EditRecord
{
    protected static string $resource = UserServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
