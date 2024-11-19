<?php

namespace App\Models\Users\Account;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    use HasFactory;
    protected $table = "login_history";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = [
        "ip_address",
        "country_code",
        "device_name",
        "country",
        "city",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
