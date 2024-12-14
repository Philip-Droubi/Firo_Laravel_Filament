<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Users\AdminResource;
use App\Models\User;
use App\Traits\FilamentComponentsTrait;
use Carbon\Carbon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class AdminsOverview extends BaseWidget
{
    use FilamentComponentsTrait;

    protected static ?string $pollingInterval = '120s';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 3;

    protected function getTableHeading(): string
    {
        return __('keys.active admins');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn() => User::query()->whereNot("role_id", 3)
                    ->whereNull('deactive_at')
                    ->with(["adminProfile"])
                    ->orderByDesc("last_seen")->limit(8)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('img_url')
                    ->defaultImageUrl(url(config('custom.user_default_image')))
                    ->circular()
                    ->size(size: 40)
                    ->toggleable()
                    ->label(__("keys.image"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make(name: 'name')
                    ->sortable()
                    ->searchable(query: function (Builder $query, $search): Builder {
                        return $query->searchName($search);
                    })
                    ->label(__("keys.name"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('role.name')
                    ->label(__("keys.role"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('adminProfile.about_user')
                    ->wrap()
                    ->lineClamp(2)
                    ->label(__("keys.about user"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('account_name')
                    ->searchable()
                    ->copyable()
                    ->label(__("keys.account name"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label(__("keys.email"))
                    ->copyable()
                    ->icon('eos-email')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->toggleable()
                    ->icon('eos-phone')
                    ->copyable()
                    ->label(__("keys.phone number"))
                    ->translateLabel(),
                self::getDateTableComponent('last_seen', 'last seen', isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('adminProfile.creator.name')
                    ->label(__("keys.created_by"))
                    ->translateLabel()
                    ->url(function (User $record): string {
                        return
                            $record->adminProfile?->created_by ?
                            AdminResource::getUrl('view', [$record->adminProfile->created_by])
                            : "";
                    }),
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at'),
            ])->defaultSort('last_seen', 'desc')
        ;
    }
}