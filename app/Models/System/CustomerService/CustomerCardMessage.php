<?php

namespace App\Models\System\CustomerService;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerCardMessage extends Model
{
    use HasFactory;
    protected $table = "customer_card_messages";
    protected $primaryKey = "id";
    protected $timestamp = true;
    protected $fillable = ["card_id", "message", "user_id"];

    public function card(): BelongsTo
    {
        return $this->belongsTo(CustomerCard::class, "card_id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}