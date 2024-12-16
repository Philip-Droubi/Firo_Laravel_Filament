<?php

namespace App\Filament\Resources\System\CustomerService\CustomerCardResource\Pages;

use App\Enums\CustomerServiceCardStatus;
use App\Filament\Resources\System\CustomerService\CustomerCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;

class ViewCustomerCard extends ViewRecord
{
    protected static string $resource = CustomerCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function ($record) {
                    $record->status = CustomerServiceCardStatus::CLOSED->value;
                    $record->save();
                }),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
            Actions\Action::make('close')
                ->action(function ($record) {
                    $record->status = CustomerServiceCardStatus::CLOSED->value;
                    $record->save();
                })
                ->color(Color::Rose)
                ->icon('heroicon-o-lock-closed')
                ->visible(fn($record): bool => $record->status == CustomerServiceCardStatus::OPEN->value || $record->status == CustomerServiceCardStatus::PENDING->value)
                ->label(__("keys.close"))
                ->translateLabel(),
            Actions\Action::make('reopen')
                ->action(function ($record) {
                    $record->status = CustomerServiceCardStatus::OPEN->value;
                    $record->save();
                })
                ->color('success')
                ->icon('heroicon-o-lock-open')
                ->visible(fn($record): bool => $record->status == CustomerServiceCardStatus::CLOSED->value)
                ->label(__("keys.reopen"))
                ->translateLabel(),
        ];
    }
}
