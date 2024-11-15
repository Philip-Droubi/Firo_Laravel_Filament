<?php

namespace App\Filament\Resources\Administration\Article\ArticleResource\Pages;

use App\Filament\Resources\Administration\Article\ArticleResource;
use App\Models\Administration\Article\Article;
use App\Models\Administration\Article\ArticleSkill;
use App\Services\Administration\Article\ArticleService;
use App\Traits\StorageHelper;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateArticle extends CreateRecord
{
    use StorageHelper;

    protected static string $resource = ArticleResource::class;

    protected function handleRecordCreation(array $data): Article
    {
        DB::beginTransaction();
        $articleService = new ArticleService();

        $article = static::getModel()::create([
            'user_id' => auth()->id(),
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'body' => $data['body'],
            'is_draft' => $data['is_draft'],
            'main_img_url' => $data["main_img_url"],
            'published_at' => $data['is_draft'] ? Carbon::now()->format('Y-m-d H:i:s') : null,
        ]);

        if ($data["skills"])
            foreach ($data["skills"] as $skill) {
                ArticleSkill::query()->firstOrCreate([
                    'article_id' => $article['id'],
                    'skill' => $skill,
                ]);
            }

        //Handle Body at the end in case there is error it will not effect the images (hopefully 😁)
        $article['body'] = $articleService->handleArticleBodyOnCreate($data["body"], $article['id'], $data['random']);
        $article->save();

        DB::commit();
        return $article;
    }
}
