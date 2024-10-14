<?php

namespace App\Filament\Resources\System\Info\AboutUsResource\Pages;

use App\Filament\Resources\System\Info\AboutUsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutUs extends ListRecords
{
    protected static string $resource = AboutUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['last_update_by'] = auth()->id();
                return $data;
            }),
        ];
    }
}