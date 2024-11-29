<?php

namespace App\Filament\Resources\System\Report\UserReportResource\Pages;

use App\Filament\Resources\System\Report\UserReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserReports extends ListRecords
{
    protected static string $resource = UserReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
