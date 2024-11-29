<?php

namespace App\Models\Users\Account;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = "user_profiles";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = [
        "user_id",
        "portfolio",
        "bio",
        "is_freelancer",
        "is_stakeholder",
        "TFA",
        "bg_img_url",
        "banned_until",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function scopeNotBannedUser(Builder $query): void
    {
        $query->whereNull('banned_until')->orWhere('banned_until', '<', Carbon::now()->format("Y-m-d H:i:s"));
    }

    public function scopeBannedUser(Builder $query): void
    {
        $query->whereNotNull('banned_until')->where('banned_until', '>=', Carbon::now()->format("Y-m-d H:i:s"));
    }
}
