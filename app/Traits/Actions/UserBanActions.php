<?php

namespace App\Traits\Actions;

use App\Services\System\Report\UserBanService;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;

trait UserBanActions
{
    protected function banUser(): Action
    {
        return Action::make('ban_user')
            ->label(__("keys.ban user"))
            ->translateLabel()
            ->color(Color::Slate)
            ->form([
                DateTimePicker::make('banned_until')
                    ->required()
                    ->native(false)
                    ->before(Carbon::now()->addYears(500)->format("Y-m-d"))
                    ->after(Carbon::now()->format('Y-m-d'))
                    ->label(__("keys.banned_until"))
                    ->translateLabel(),
                TextInput::make("reason")
                    ->required()
                    ->minLength(1)
                    ->maxLength(600)
                    ->label(__("keys.reason"))
                    ->translateLabel(),
            ])->fillForm(function ($record) {
                if (!$record->profile->banned_until)
                    return [];
                $lastBan = $record->bans()->latest()->first();
                return [
                    "reason" => $lastBan->reason,
                    "banned_until" => $lastBan->banned_until,
                ];
            })
            ->action(function ($data, $record) {
                (new UserBanService())->ban($data, $record->account_name);
                $this->record->refresh();
                Notification::make()
                    ->title(__("messages.user has been banned"))
                    ->warning()
                    ->send();
            })
            ->after(function ($livewire) {
                $livewire->dispatch('refreshBanLog');
            })
            ->requiresConfirmation();
    }

    protected function unBanUser(): Action
    {
        return Action::make('unban_user')
            ->label(__("keys.unban user"))
            ->translateLabel()
            ->color(Color::Slate)
            ->visible(fn($record): bool => !is_null($record->profile->banned_until))
            ->action(function ($data, $record) {
                (new UserBanService())->unBan($record->account_name);
                $this->record->refresh();
                Notification::make()
                    ->title(__(key: "messages.user has been unbanned"))
                    ->color(Color::Amber)
                    ->send();
            })
            ->after(function ($livewire) {
                $livewire->dispatch('refreshRelation');
            })
            ->requiresConfirmation();
    }
}
