<?php

namespace App\Filament\Resources\Administration\App\SubCategoryResource\Pages;

use App\Filament\Resources\Administration\App\SubCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubCategory extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = SubCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
