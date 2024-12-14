<?php

namespace App\Filament\Resources\System\CustomerService\CustomerCardResource\Pages;

use App\Filament\Resources\System\CustomerService\CustomerCardResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerCard extends CreateRecord
{
    protected static string $resource = CustomerCardResource::class;
}
