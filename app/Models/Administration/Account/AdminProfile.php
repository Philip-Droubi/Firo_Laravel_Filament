<?php

namespace App\Models\Administration\Account;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminProfile extends Model
{
    use HasFactory;
    protected $table = "admin_profiles";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["user_id", "about_user", "created_by"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by");
    }
}
