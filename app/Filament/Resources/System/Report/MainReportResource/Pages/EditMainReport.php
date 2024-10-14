<?php

namespace App\Filament\Resources\System\Report\MainReportResource\Pages;

use App\Filament\Resources\System\Report\MainReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMainReport extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = MainReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
