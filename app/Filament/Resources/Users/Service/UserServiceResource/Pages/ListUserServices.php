<?php

namespace App\Filament\Resources\Users\Service\UserServiceResource\Pages;

use App\Filament\Resources\Users\Service\UserServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserServices extends ListRecords
{
    protected static string $resource = UserServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
