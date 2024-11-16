<?php

namespace App\Filament\Resources\System\Roles\RoleResource\Pages;

use App\Filament\Resources\System\Roles\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['created_by'] = auth()->id();
                return $data;
            }),
        ];
    }
}
