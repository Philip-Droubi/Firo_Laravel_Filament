<?php

namespace App\Models\System\CustomerService;

use App\Models\System\Report\UserReport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerCard extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "customer_cards";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = [
        "user_id",
        "title",
        "description",
        "is_private",
        "type",
        "status",
        "deleted_at",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(CustomerCardMessage::class, "card_id");
    }

    public function reports(): MorphMany
    {
        return $this->morphMany(UserReport::class, "reportable");
    }
}