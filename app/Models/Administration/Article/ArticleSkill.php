<?php

namespace App\Models\Administration\Article;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleSkill extends Model
{
    use HasFactory;

    protected $table = "article_skills";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["article_id", "skill"];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
