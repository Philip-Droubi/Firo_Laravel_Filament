<?php

namespace App\Http\Requests\System\CustomerService;

use App\Enums\CustomerServiceCardStatus;
use Illuminate\Foundation\Http\FormRequest;

class CustomerServiceMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return match ($this->route()->getActionMethod()) {
            "store" => $this->storeRules(),
        };
    }

    public function storeRules()
    {
        return [
            "card_id" => ["required", 'exists:customer_cards,id'],
            "message" => ["required", "string", "between:1,2500"],
        ];
    }
}