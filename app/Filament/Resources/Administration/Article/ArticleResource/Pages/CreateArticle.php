<?php

namespace App\Filament\Resources\Administration\Article\ArticleResource\Pages;

use App\Filament\Resources\Administration\Article\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;
}
