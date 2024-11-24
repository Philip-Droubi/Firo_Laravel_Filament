<?php

namespace App\Filament\Resources\Users\UserResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class LoginHistoryRelationManager extends RelationManager
{
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
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("keys.created_at"))
                    ->translateLabel()
                    ->dateTime('Y-m-d g:i a')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])->defaultSort('created_at', 'desc');
    }
}
