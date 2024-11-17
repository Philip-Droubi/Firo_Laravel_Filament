<?php

namespace App\Filament\Resources\Users\AdminResource\Pages;

use App\Filament\Resources\Users\AdminResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAdmin extends ViewRecord
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
