<?php

namespace App\Filament\Resources\Users\UserResource\Pages;

use App\Filament\Resources\Users\LoginHistoryResource;
use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\Users\UserResource\RelationManagers\LoginHistoryRelationManager;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function getRelationManagers(): array
    {
        return [
            LoginHistoryRelationManager::class,
        ];
    }
}
