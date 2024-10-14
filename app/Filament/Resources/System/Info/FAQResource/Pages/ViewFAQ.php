<?php

namespace App\Filament\Resources\System\Info\FAQResource\Pages;

use App\Filament\Resources\System\Info\FAQResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFAQ extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = FAQResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\EditAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['last_update_by'] = auth()->id();
                return $data;
            }),
        ];
    }
}
