<?php

namespace App\Models\Administration\Article;

use App\Models\Administration\App\Category;
use App\Models\User;
use App\Models\Users\Favorite\Favorite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Article extends Model
{
    use HasFactory;

    protected $table = "articles";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ['user_id', 'category_id', 'main_img_url', 'title', 'body', 'published_at', 'is_draft'];
    protected $casts = ['is_draft'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function skills(): HasMany
    {
        return $this->hasMany(ArticleSkill::class, 'article_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function article_images(): HasMany
    {
        return $this->hasMany(ArticleImage::class, 'article_id');
    }
}
