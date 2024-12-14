<?php

namespace App\Filament\Resources\System\CustomerService\CustomerCardResource\Pages;

use App\Filament\Resources\System\CustomerService\CustomerCardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerCard extends EditRecord
{
    protected static string $resource = CustomerCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
