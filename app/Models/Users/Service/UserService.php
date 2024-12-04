<?php

namespace App\Models\Users\Service;

use App\Models\Administration\App\Category;
use App\Models\System\Report\UserReport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class UserService extends Model
{
    use HasFactory;

    protected $table = "user_services";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ['user_id', 'category_id', 'title', 'body', 'is_visible'];
    protected $casts = ['is_visible' => 'boolean'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reports(): MorphMany
    {
        return $this->morphMany(UserReport::class, "reportable");
    }
}
