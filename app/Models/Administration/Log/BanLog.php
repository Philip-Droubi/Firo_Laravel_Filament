<?php

namespace App\Models\Administration\Log;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanLog extends Model
{
    use HasFactory;
    protected $table = "ban_logs";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["banned_id", "banned_by_id", "is_auto", "reason", "banned_until"];

    public function bannedUser()
    {
        return $this->belongsTo(User::class, "banned_id");
    }

    public function banningUser()
    {
        return $this->belongsTo(User::class, "banned_by_id");
    }
}
