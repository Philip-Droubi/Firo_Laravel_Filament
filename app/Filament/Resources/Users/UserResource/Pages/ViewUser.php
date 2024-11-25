<?php

namespace App\Filament\Resources\Users\UserResource\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\Users\UserResource\RelationManagers\BansRelationManager;
use App\Filament\Resources\Users\UserResource\RelationManagers\LoginHistoryRelationManager;
use App\Filament\Resources\Users\UserResource\RelationManagers\PointsRelationManager;
use App\Services\System\Report\UserBanService;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('ban_user')
                ->label(__("keys.ban user"))
                ->translateLabel()
                ->color('danger')
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
                    (new UserBanService())->ban($data, $record);
                    $this->record->refresh();
                    Notification::make()
                        ->title(__("messages.user has been banned"))
                        ->warning()
                        ->send();
                })
                ->after(function ($livewire) {
                    $livewire->dispatch('refreshBanLog');
                })
                ->requiresConfirmation(),
            Actions\Action::make('unban_user')
                ->label(__("keys.unban user"))
                ->translateLabel()
                ->color('danger')
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
                ->requiresConfirmation(),
        ];
    }

    public function getRelationManagers(): array
    {
        return [
            PointsRelationManager::class,
            LoginHistoryRelationManager::class,
            BansRelationManager::class,
        ];
    }
}