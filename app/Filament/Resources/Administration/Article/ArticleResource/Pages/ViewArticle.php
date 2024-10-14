<?php

namespace App\Filament\Resources\Administration\Article\ArticleResource\Pages;

use App\Filament\Resources\Administration\Article\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewArticle extends ViewRecord
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
