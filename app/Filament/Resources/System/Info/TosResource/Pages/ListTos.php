<?php

namespace App\Filament\Resources\System\Info\TosResource\Pages;

use App\Filament\Resources\System\Info\TosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTos extends ListRecords
{
    protected static string $resource = TosResource::class;

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
