<?php

namespace App\Models\Administration\App;

use App\Models\Administration\Article\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $table = "categories";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["name"];
    public $translatable = ['name'];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'article_id');
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, "category_id");
    }
}