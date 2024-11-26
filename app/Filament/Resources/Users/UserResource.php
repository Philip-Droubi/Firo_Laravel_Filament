<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\UserResource\Pages;
use App\Models\User;
use App\Models\Users\Account\UserSkill;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Awcodes\FilamentBadgeableColumn\Components\BadgeableColumn;

class UserResource extends BaseResource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 1;

    protected static ?string $slug = 'users';

    public static function canViewAny(): bool
    {
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 4]));;
    }

    public static function canView($user): bool
    {
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 4]));
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($user): bool
    {
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 4]));
    }

    public static function canDelete($user): bool
    {
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 4]));
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('role_id', 3);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('img_url')
                    ->defaultImageUrl(url(config('custom.user_default_image')))
                    ->circular()
                    ->size(size: 40)
                    ->toggleable()
                    ->label(__("keys.image"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make(name: 'name')
                    ->searchable(query: function (Builder $query, $search): Builder {
                        return $query->searchName($search);
                    })
                    ->sortable()
                    ->label(__("keys.name"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('profile.bio')
                    ->wrap()
                    ->extraAttributes(["style" => 'width:200px'])
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
                //Skills
                BadgeableColumn::make("skills.skill")
                    ->getStateUsing(function ($record) {
                        $limit = 5;
                        $data = UserSkill::query()->where(["user_id" => $record->id])->limit($limit)->pluck('skill')->toArray();
                        if (($count = UserSkill::query()->where(["user_id" => $record->id])->count()) > $limit) {
                            array_push($data, "+" . $count . " more");
                        }
                        return $data;
                    })
                    ->badge()
                    ->extraAttributes(["style" => 'width:200px'])
                    ->color(Color::Teal),
                self::getDateTableComponent('last_seen', 'last seen', isToggledHiddenByDefault: false),
                self::getDateTableComponent('deactive_at', 'deactive_at', isToggledHiddenByDefault: false),
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.users');
    }

    public static function getModelLabel(): string
    {
        return __('keys.user');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.users');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system users');
    }
}
