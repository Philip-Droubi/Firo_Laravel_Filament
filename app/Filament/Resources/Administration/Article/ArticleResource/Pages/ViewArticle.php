<?php

namespace App\Filament\Resources\Administration\Article\ArticleResource\Pages;

use App\Filament\Resources\Administration\Article\ArticleResource;
use App\Models\Administration\Article\Article;
use App\Models\Administration\Article\ArticleSkill;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Storage;

class ViewArticle extends ViewRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['skills'] = ArticleSkill::where(["article_id" => $data["id"]])->pluck("skill")->toArray();
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make()
                ->after(function (Article $record) {
                    if ($record->main_img_url && Storage::disk('public')->exists($record->main_img_url)) {
                        Storage::disk("public")->delete($record->main_img_url);
                    }
                    Storage::disk('public')->deleteDirectory("articles/" . $record->id);
                }),
        ];
    }
}
