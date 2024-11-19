<?php

namespace App\Models\Users\Account;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFcmToken extends Model
{
    use HasFactory;
    protected $table = "user_fcm_tokens";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = [
        "fcm_token", "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
