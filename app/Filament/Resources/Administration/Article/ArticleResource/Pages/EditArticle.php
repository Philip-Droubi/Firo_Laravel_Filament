<?php

namespace App\Filament\Resources\Administration\Article\ArticleResource\Pages;

use App\Filament\Resources\Administration\Article\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Administration\Article\ArticleImage;
use App\Models\Administration\Article\Article;
use App\Models\Administration\Article\ArticleSkill;
use App\Services\Administration\Article\ArticleService;
use App\Traits\StorageHelper;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditArticle extends EditRecord
{
    use StorageHelper;
    protected static string $resource = ArticleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['random'] = Str::random(30);
        $data['skills'] = ArticleSkill::where(["article_id" => $data["id"]])->pluck("skill")->toArray();
        return $data;
    }

    protected function handleRecordUpdate($record, array $data): Article
    {
        $articleService = new ArticleService();

        DB::beginTransaction();
        $record->category_id = $data["category_id"];
        $record->title = $data["title"];
        $record->is_draft = $data["is_draft"];
        //Handle main image
        if ($data["main_img_url"] != $record->main_img_url) {
            if ($record->main_img_url) Storage::disk('public')->delete($record->main_img_url);
            $record->main_img_url = $data["main_img_url"];
        }

        //Add new Skills
        if ($data["skills"])
            foreach ($data["skills"] as $skill) {
                ArticleSkill::query()->firstOrCreate([
                    'article_id' => $record['id'],
                    'skill' => $skill,
                ]);
            }
        //Remove old unused skills
        ArticleSkill::query()->whereNotIn("skill", $data["skills"])->where("article_id", $record->id)->delete();

        //Handle Article Body
        $record->body = $articleService->handleArticleBodyOnEdit($data["body"], $record['id'], $data['random']);
        $record->save();

        DB::commit();
        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
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