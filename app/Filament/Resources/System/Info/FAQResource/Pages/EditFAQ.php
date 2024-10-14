<?php

namespace App\Filament\Resources\System\Info\FAQResource\Pages;

use App\Filament\Resources\System\Info\FAQResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFAQ extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = FAQResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
