<?php

namespace App\Models\System\Info;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FAQ extends Model
{
    use HasFactory, HasTranslations;
    protected $table = "faq";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["question", "answer", "last_update_by"];
    public $translatable = ['question', 'answer'];

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'last_update_by');
    }
}
