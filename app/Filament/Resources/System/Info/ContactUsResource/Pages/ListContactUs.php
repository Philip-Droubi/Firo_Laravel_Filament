<?php

namespace App\Filament\Resources\System\Info\ContactUsResource\Pages;

use App\Filament\Resources\System\Info\ContactUsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactUs extends ListRecords
{
    protected static string $resource = ContactUsResource::class;

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
