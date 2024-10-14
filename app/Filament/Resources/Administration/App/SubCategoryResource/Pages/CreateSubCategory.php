<?php

namespace App\Filament\Resources\Administration\App\SubCategoryResource\Pages;

use App\Filament\Resources\Administration\App\SubCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubCategory extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = SubCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
