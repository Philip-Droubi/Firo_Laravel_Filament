<?php

namespace App\Models\System\Roles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abilitie extends Model
{
    use HasFactory;
    protected $table = "abilities";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ['name', 'description'];

    public function roles()
    {
        return $this->belongsToMany(Abilitie::class, 'roles_abilities', 'ability_id', 'role_id');
    }
}
