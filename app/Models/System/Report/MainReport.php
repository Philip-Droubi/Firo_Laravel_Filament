<?php

namespace App\Models\System\Report;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MainReport extends Model
{
    use HasFactory, HasTranslations;

    protected $table = "main_reports";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["name"];
    public $translatable = ['name'];

    public function userReports()
    {
        return $this->hasMany(UserReport::class, "report_id");
    }
}
