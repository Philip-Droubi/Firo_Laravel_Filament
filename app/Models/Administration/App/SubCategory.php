<?php

namespace App\Models\Administration\App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubCategory extends Model
{
    use HasFactory, HasTranslations;
    protected $table = "sub_categories";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["name", "category_id"];
    public $translatable = ['name'];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
}
