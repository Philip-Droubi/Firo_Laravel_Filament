<?php

namespace App\Filament\Resources\Users\LoginHistoryResource\Pages;

use App\Filament\Resources\Users\LoginHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLoginHistories extends ListRecords
{
    protected static string $resource = LoginHistoryResource::class;
}
