<?php

namespace App\Filament\Resources\System\Info\FAQResource\Pages;

use App\Filament\Resources\System\Info\FAQResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFAQ extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = FAQResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
