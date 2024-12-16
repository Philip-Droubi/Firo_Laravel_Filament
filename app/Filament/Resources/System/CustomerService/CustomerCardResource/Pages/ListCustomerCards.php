<?php

namespace App\Filament\Resources\System\CustomerService\CustomerCardResource\Pages;

use App\Filament\Resources\System\CustomerService\CustomerCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomerCards extends ListRecords
{
    protected static string $resource = CustomerCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
