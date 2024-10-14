<?php

namespace App\Filament\Resources\Administration\App\SubCategoryResource\Pages;

use App\Filament\Resources\Administration\App\SubCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubCategories extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = SubCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
