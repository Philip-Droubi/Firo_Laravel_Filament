<?php

namespace App\Models\Administration\App;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppFeature extends Model
{
    use HasFactory;
    protected $table = "app_features";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = [
        'name',
        'is_active',
        'updated_by'
    ];

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
