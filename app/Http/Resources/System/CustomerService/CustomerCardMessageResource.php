<?php

namespace App\Http\Resources\System\CustomerService;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerCardMessageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $messageUser = $this->user;
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "user_name" => $messageUser->getName(),
            "user_img" => $messageUser->getAvatar(),
            "is_admin" => $messageUser->role_id != 3,
            "message" => $this->message,
            "created_at" => Carbon::parse($this->created_at)->translatedFormat('Y-m-d h:i A'),
        ];
    }
}