<?php

namespace App\Models\System\Info;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = "contact_us";
    protected $primaryKey = "id";
    protected $fillable = ['type', 'link', 'created_by'];
    protected $timestamp = true;

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function setLinkAttribute($value)
    {
        $this->attributes['link'] = trim($value);
    }
}
