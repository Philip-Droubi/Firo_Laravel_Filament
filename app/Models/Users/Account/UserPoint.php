<?php

namespace App\Models\Users\Account;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    use HasFactory;
    protected $table = "user_points";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["user_id", "points", "case"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
