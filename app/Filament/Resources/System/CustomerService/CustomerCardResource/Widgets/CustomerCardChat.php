<?php

namespace App\Filament\Resources\System\CustomerService\CustomerCardResource\Widgets;

use App\Http\Resources\System\CustomerService\CustomerCardMessageResource;
use App\Models\System\CustomerService\CustomerCardMessage;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class CustomerCardChat extends Widget
{
    public $widgetData;
    public ?Model $record = null;
    protected static ?string $pollingInterval = '120s';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;
    protected static string $view = 'filament.resources.system.customer-service.customer-card-resource.widgets.customer-card-chat';

    protected function getViewData(): array
    {
        $messages = CustomerCardMessage::query()
            ->where('card_id', $this->record->id)
            ->orderBy('created_at', 'desc')
            ->with('user')
            ->get();
        return ["messages" => CustomerCardMessageResource::collection($messages)->toArray(request())];
    }
}