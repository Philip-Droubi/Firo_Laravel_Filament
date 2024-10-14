<?php

namespace App\Models\System\Info;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = "states";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["country_id", "name_en", "name_ar"];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'state_id');
    }

    public function setNameEnAttribute($value)
    {
        $this->attributes['name_en'] = trim(ucfirst(strtolower($value)));
    }
}
