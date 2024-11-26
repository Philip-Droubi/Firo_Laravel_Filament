<?php

namespace App\Filament\Resources\Users\UserResource\RelationManagers;

use App\Traits\FilamentComponentsTrait;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class LoginHistoryRelationManager extends RelationManager
{
    use FilamentComponentsTrait;
    protected static string $relationship = 'loginHistory';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('keys.login history');
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ip_address')
            ->columns([
                Tables\Columns\TextColumn::make('country')
                    ->searchable()
                    ->sortable()
                    ->label(__("keys.country"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->sortable()
                    ->label(__("keys.city"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('device_name')
                    ->searchable()
                    ->label(__("keys.device_name"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('ip_address')
                    ->toggleable()
                    ->label(__("keys.ip_address"))
                    ->translateLabel(),
                self::getDateTableComponent(isToggledHiddenByDefault: false),
            ])->defaultSort('created_at', 'desc');
    }


    public static function getModelLabel(): string
    {
        return __('keys.login history');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.items');
    }
}
