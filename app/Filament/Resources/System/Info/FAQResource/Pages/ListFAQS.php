<?php

namespace App\Filament\Resources\System\Info\FAQResource\Pages;

use App\Filament\Resources\System\Info\FAQResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFAQS extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = FAQResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['last_update_by'] = auth()->id();
                return $data;
            }),
        ];
    }
}
