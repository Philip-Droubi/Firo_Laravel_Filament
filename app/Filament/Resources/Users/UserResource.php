<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\UserResource\Pages;
use App\Models\User;
use App\Models\Users\Account\UserSkill;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Awcodes\FilamentBadgeableColumn\Components\BadgeableColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

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

    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        return "{$record->first_name} {$record->last_name}";
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['first_name', 'last_name'];
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return UserResource::getUrl('view', ['record' => $record]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__("keys.Account Status"))
                    ->schema([
                        Section::make("")->schema([
                            Forms\Components\Toggle::make('deactive_at_toggle')
                                ->label(__("keys.status"))
                                ->translateLabel(),
                            Forms\Components\Toggle::make('is_freelancer')
                                ->label(__("keys.freelancer"))
                                ->translateLabel(),
                            Forms\Components\Toggle::make('is_stakeholder')
                                ->label(__("keys.stakeholder"))
                                ->translateLabel(),
                            Forms\Components\Toggle::make('tfa')
                                ->label(__("keys.tfa"))
                                ->translateLabel(),
                        ])->columns(4),
                        Forms\Components\TextInput::make("deactive_at_time")
                            ->label(__("keys.deactive_at"))
                            ->translateLabel(),
                        Forms\Components\DateTimePicker::make("last_seen")
                            ->label(__("keys.last seen"))
                            ->translateLabel(),
                        Forms\Components\DateTimePicker::make("created_at")
                            ->label(__("keys.created_at"))
                            ->translateLabel(),
                        Forms\Components\DateTimePicker::make("updated_at")
                            ->label(__("keys.updated_at"))
                            ->translateLabel(),
                    ])
                    ->columns(3),
                Section::make("")->schema([
                    FileUpload::make('img_url')
                        ->columnSpanFull()
                        ->label(__("keys.main_image"))
                        ->translateLabel(),
                    FileUpload::make('bg_img_url')
                        ->columnSpanFull()
                        ->label(__("keys.bg_image"))
                        ->translateLabel(),
                ]),
                Section::make(__("keys.User personal info"))
                    ->schema([
                        Forms\Components\TextInput::make("first_name")
                            ->label(__("keys.first name"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("mid_name")
                            ->label(__("keys.middle name"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("last_name")
                            ->label(__("keys.last name"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("account_name")
                            ->suffixIcon('eos-alternate-email-o')
                            ->suffixIconColor('warning')
                            ->label(__("keys.account name"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("email")
                            ->prefixIcon('eos-email')
                            ->prefixIconColor('warning')
                            ->label(__("keys.email"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("phone_number")
                            ->prefixIcon('eos-phone')
                            ->prefixIconColor('warning')
                            ->label(__("keys.phone number"))
                            ->translateLabel(),
                        Forms\Components\Select::make('country_id')
                            ->relationship(name: 'country', titleAttribute: 'name_' . app()->getLocale())
                            ->prefixIcon('heroicon-o-flag')
                            ->prefixIconColor('warning')
                            ->label(__("keys.country"))
                            ->translateLabel(),
                        Forms\Components\Select::make('state_id')
                            ->relationship(name: 'state', titleAttribute: 'name_' . app()->getLocale())
                            ->prefixIcon('heroicon-o-building-office-2')
                            ->prefixIconColor('warning')
                            ->label(__("keys.state"))
                            ->translateLabel(),
                        Forms\Components\DatePicker::make("birth_date")
                            ->prefixIcon('fas-birthday-cake')
                            ->prefixIconColor('warning')
                            ->label(__("keys.birth date"))
                            ->translateLabel(),
                        //Skills
                        Forms\Components\Select::make("user_skills")
                            ->prefix(function ($record): int {
                                return UserSkill::where('user_id', $record->id)->count();
                            })
                            ->prefixIcon('heroicon-o-academic-cap')
                            ->prefixIconColor('warning')
                            ->multiple()
                            ->columnSpanFull()
                            ->label(__("keys.skills"))
                            ->translateLabel(),
                    ])
                    ->columns(3),
                //Bio
                Forms\Components\Textarea::make('bio')
                    ->columnSpanFull()
                    ->rows(4)
                    ->label(__("keys.about user"))
                    ->translateLabel(),
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
                    ->color(Color::Teal)
                    ->label(__("keys.skills"))
                    ->translateLabel(),
                self::getDateTableComponent('last_seen', 'last seen', isToggledHiddenByDefault: false),
                self::getDateTableComponent('deactive_at', 'deactive_at', isToggledHiddenByDefault: false),
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at')
            ])
            ->filters([
                SelectFilter::make('active')
                    ->options([
                        1 => __("keys.active"),
                        2 => __("keys.inactive"),
                    ])
                    ->query(function (Builder $query, $state) {
                        if ($state["value"] == 1) return $query->whereNull("deactive_at");
                        if ($state["value"] == 2) return $query->whereNotNull("deactive_at");
                    })
                    ->label(__("keys.Account Status"))
                    ->translateLabel(),
                Filter::make("banned")
                    ->query(function (Builder $query, $state) {
                        return $query->withWhereHas('profile', function (Builder $q) {
                            return $q->BannedUser();
                        });
                    })
                    ->default(false)
                    ->label(__("keys.banned only"))
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
