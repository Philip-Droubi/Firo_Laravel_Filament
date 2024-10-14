<?php

namespace App\Models\System\Report;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{
    use HasFactory;
    protected $table = "user_reports";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["reporter_id", "reported_id", "report_id", "reportable_id", "reportable_type"];

    public function report()
    {
        return $this->belongsTo(MainReport::class, "report_id");
    }

    public function reported()
    {
        return $this->belongsTo(User::class, "reported_id");
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, "reporter_id");
    }

    public function reportable()
    {
        return $this->morphTo();
    }
}
