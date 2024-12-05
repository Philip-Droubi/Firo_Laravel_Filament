<?php

namespace App\Filament\Resources\Users\Service\UserServiceResource\Pages;

use App\Filament\Resources\Users\Service\UserServiceResource;
use App\Filament\Resources\Users\Service\UserServiceResource\RelationManagers\ReportsRelationManager;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUserServices extends ViewRecord
{
    protected static string $resource = UserServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->before(function ($record) {
                $record->reports()->delete();
            }),
        ];
    }

    public function getRelationManagers(): array
    {
        return [
            ReportsRelationManager::class,
        ];
    }
}