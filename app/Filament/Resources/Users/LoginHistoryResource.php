<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\LoginHistoryResource\Pages;
use App\Models\User;
use App\Models\Users\Account\LoginHistory;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LoginHistoryResource extends Resource
{
    protected static ?string $model = LoginHistory::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?Model $user = null;

    public static function canViewAny(): bool
    {
        $user = self::getUser();
        if ($user->role_id != 3)
            return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 3]));
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 4]));
    }

    public static function getUser(): Builder|Model
    {
        if (!self::$user)
            self::$user = User::query()->where("account_name", request()->user)
                ->firstOrFail(["id", "first_name", "last_name", "role_id"]);
        return self::$user;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', self::getUser()->id);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                    ->label(__('keys.created_at'))
                    ->translateLabel()
                    ->dateTime('Y-m-d g:i a')
                    ->sortable()
                    ->toggleable(),
            ])->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoginHistories::route('/'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.login history page title', ["user_name" => self::getUser()->name]);
    }
}
