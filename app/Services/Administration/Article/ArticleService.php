<?php

namespace App\Services\Administration\Article;

use App\Models\Administration\Article\ArticleImage;
use App\Services\MainService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * Class ArticleService.
 */
class ArticleService extends MainService
{
    public function handleArticleBodyOnCreate(string $text, $articleID, string $randomKey): string
    {
        //Get images urls from body
        $bodyImagesTempUrls = $this->extractFromHTML($text, "img", "src");

        //Remove (storage/) from all urls
        $resultBodyImagesTempUrls = array_map(function ($value) {
            return Str::replaceFirst('/storage/', '', $value);
        }, $bodyImagesTempUrls);

        $imagesDB = [];
        //Change images directory
        foreach ($resultBodyImagesTempUrls as $url) {
            if (Storage::disk('public')->exists($url)) {
                Storage::disk('public')->move($url, 'articles/' . $articleID . '/' . pathinfo($url)['basename']);
                $imagesDB[] = [
                    'article_id' => $articleID,
                    'img_url' => 'articles/' . $articleID . '/' . pathinfo($url)['basename'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }
        }
        ArticleImage::insert($imagesDB);

        //Add website url to the img src tag in body text and change the directory
        if (Str::contains($text, 'src="/storage/temp/articles')) {
            $text = str_replace('src="/storage/temp/articles/' . $randomKey, 'src="' . config("app.url") . '/storage/articles/' . $articleID, $text);
        }

        //Delete Temp folder
        Storage::disk('public')->deleteDirectory('temp/articles/' . $randomKey);

        return $text;
    }

    public function handleArticleBodyOnEdit(string $text, $articleID, string $randomKey): string
    {
        $bodyImagesTempUrls = $this->extractFromHTML($text, "img", "src");

        //Remove substring before and includ (storage/) from all urls
        $resultBodyImagesTempUrls = array_map(function ($value) {
            return preg_replace('/.*\/storage\//', '', $value);
        }, $bodyImagesTempUrls);

        //Remove old unused images
        $oldImagesUrls = array_filter($resultBodyImagesTempUrls, function ($url) {
            return strpos($url, 'temp/') !== 0;
        });
        //Delete from DB
        $oldUnusedImages = ArticleImage::query()->where("article_id", $articleID)->whereNotIn('img_url', $oldImagesUrls)->get();
        //Delete from storage
        foreach ($oldUnusedImages as $image) {
            Storage::disk("public")->delete($image->img_url);
            $image->delete();
        }

        //Store new images
        $imagesDB = [];
        $newImagesUrls = array_filter($resultBodyImagesTempUrls, function ($url) {
            return strpos($url, 'temp/') === 0;
        });

        foreach ($newImagesUrls as $url) {
            if (Storage::disk('public')->exists($url)) {
                Storage::disk('public')->move($url, 'articles/' . $articleID . '/' . pathinfo($url)['basename']);
                $imagesDB[] = [
                    'article_id' => $articleID,
                    'img_url' => 'articles/' . $articleID . '/' . pathinfo($url)['basename'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }
        }
        ArticleImage::insert($imagesDB);

        //Add website url to the img src tag in body text and change the directory
        if (Str::contains($text, 'src="/storage/temp/articles')) {
            $text = str_replace('src="/storage/temp/articles/' . $randomKey, 'src="' . config("app.url") . '/storage/articles/' . $articleID, $text);
        }

        //Delete Temp folder
        Storage::disk('public')->deleteDirectory('temp/articles/' . $randomKey);
        return $text;
    }

    public function extractFromHTML($text, $tag, $attribute): array
    {
        $dom = new \DOMDocument;
        libxml_use_internal_errors(true); // Suppress warnings for invalid HTML
        $dom->loadHTML($text);
        libxml_clear_errors();

        $images = $dom->getElementsByTagName($tag);

        $srcArray = [];
        foreach ($images as $img) {
            $srcArray[] = $img->getAttribute($attribute);
        }

        return $srcArray;
    }
}
