<?php

namespace App\Models\System\Roles;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ['name', 'description', 'created_by'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_id');
    }

    public function abilities(): BelongsToMany
    {
        return $this->belongsToMany(Abilitie::class, 'roles_abilities', 'role_id', 'ability_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = ucfirst(strtolower(trim($value)));
    }

    public function setDescriptionAttribute($value): void
    {
        $this->attributes['description'] = trim($value);
    }
}
