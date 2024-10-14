<?php

namespace App\Filament\Resources\System\Report\MainReportResource\Pages;

use App\Filament\Resources\System\Report\MainReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMainReports extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = MainReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
