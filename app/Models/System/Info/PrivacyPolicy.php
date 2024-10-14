<?php

namespace App\Models\System\Info;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    use HasFactory;
    protected $table = "privacy_policies";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["lang", "text", "last_update_by"];

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'last_update_by');
    }
}
