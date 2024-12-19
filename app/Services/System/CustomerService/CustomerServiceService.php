<?php

namespace App\Services\System\CustomerService;

use App\Enums\CustomerServiceCardStatus;
use App\Http\Resources\System\CustomerService\CustomerCardMessageResource;
use App\Models\System\CustomerService\CustomerCardMessage;
use App\Services\MainService;
use Illuminate\Support\Facades\DB;

/**
 * Class CustomerServiceService.
 */
class CustomerServiceService extends MainService
{
    public function index()
    {
        //
    }

    public function store($validatedData): void
    {
        DB::beginTransaction();
        $message = CustomerCardMessage::create([
            "card_id" => $validatedData["card_id"],
            "user_id" => auth()->id(),
            "message" => $validatedData["message"],
        ]);
        $card = $message->card;
        if (auth()->user()->role_id != 3 && $card->status == CustomerServiceCardStatus::PENDING->value) {
            $card->status = CustomerServiceCardStatus::OPEN->value;
            $card->save();
        }
        DB::commit();
    }

    public function destroy($id): bool
    {
        return CustomerCardMessage::findOrFail($id)->delete();
    }
}