<?php

namespace App\Models\System\Roles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Abilitie extends Model
{
    use HasFactory;
    protected $table = "abilities";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ['name', 'description'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Abilitie::class, 'roles_abilities', 'ability_id', 'role_id');
    }
}
