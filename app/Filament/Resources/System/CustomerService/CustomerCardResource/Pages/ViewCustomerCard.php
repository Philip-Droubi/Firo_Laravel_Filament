<?php

namespace App\Filament\Resources\System\CustomerService\CustomerCardResource\Pages;

use App\Filament\Resources\System\CustomerService\CustomerCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCustomerCard extends ViewRecord
{
    protected static string $resource = CustomerCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
