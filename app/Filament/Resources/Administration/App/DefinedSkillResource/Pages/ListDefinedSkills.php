<?php

namespace App\Filament\Resources\Administration\App\DefinedSkillResource\Pages;

use App\Filament\Resources\Administration\App\DefinedSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDefinedSkills extends ListRecords
{
    protected static string $resource = DefinedSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
