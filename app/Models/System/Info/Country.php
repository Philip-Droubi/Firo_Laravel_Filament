<?php

namespace App\Models\System\Info;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = "countries";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ['name_en', 'name_ar', 'code', 'dial_code'];

    public function states()
    {
        return $this->hasMany(State::class, 'country_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'country_id');
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = trim(strtoupper($value));
    }

    public function setNameEnAttribute($value)
    {
        $this->attributes['name_en'] = trim(ucfirst($value));
    }
}
