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
    public function index($card_id, $limit = 30)
    {
        // $data = [];
        // $items = [];
        // $limit <= 0 ? $limit = 30 : false;
        // $user = auth("sanctum")->user();
        // $messages = CustomerCardMessage::query()->where("card_id", $card_id);
        // if ($user && $user->role_id == 3)
        //     $messages->whereHas("card", function ($query) {
        //         $query->where("is_private", false)
        //             ->orWhere("user_id", auth('sanctum')->id());
        //     });
        // $messages = $messages->with("user")->orderBy("created_at", "desc")->paginate($limit);
        // foreach ($messages as $message) {
        //     $items[] = new CustomerCardMessageResource($message);
        // }
        // $data["items"] = $items;
        // $data = $this->setPaginationData($messages, $data);
        // return $data;
    }

    public function store($validatedData)
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
        return new CustomerCardMessageResource($message);
    }
}