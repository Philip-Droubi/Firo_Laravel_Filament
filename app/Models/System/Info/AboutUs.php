<?php

namespace App\Models\System\Info;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $table = "about_us";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["lang", "text", "last_update_by"];

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'last_update_by');
    }
}