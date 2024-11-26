<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\AdminResource\Pages;
use App\Models\System\Roles\Role;
use App\Models\User;
use App\Traits\PublicStyles;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rules\Password  as PasswordRules;
use Rawilk\FilamentPasswordInput\Password as PasswordFiled;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\HtmlString;

class AdminResource extends BaseResource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'eos-admin-o';

    protected static ?int $navigationSort = 2;

    protected static ?string $slug = 'admins';

    public static function canViewAny(): bool
    {
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 3]));;
    }

    public static function canView($user): bool
    {
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 3]));
    }

    public static function canCreate(): bool
    {
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 3]));
    }

    public static function canEdit($user): bool
    {
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 3]));
    }

    public static function canDelete($user): bool
    {
        return !empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 3]));
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereNot('role_id', 3);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__("keys.User Creation Info"))
                    ->schema([
                        Placeholder::make("user.name")
                            ->label(__("keys.created_by"))
                            ->translateLabel()
                            ->content(function ($record) {
                                if ($record->adminProfile->created_by)
                                    return new HtmlString('<a href="' . AdminResource::getUrl('view', [$record->adminProfile?->created_by]) . '">' . $record->adminProfile?->creator?->name . '</a>');
                                return "N/A";
                            })->extraAttributes(['style' => (new class {
                                use PublicStyles;
                            })->getInfolistFieldStyle()]),
                        Forms\Components\DateTimePicker::make("created_at")
                            ->label(__("keys.created_at"))
                            ->translateLabel(),
                        Forms\Components\DateTimePicker::make("updated_at")
                            ->label(__(key: "keys.updated_at"))
                            ->translateLabel(),
                    ])
                    ->visibleOn("view")
                    ->columns(3),
                Section::make(__("keys.Account Status"))
                    ->schema([
                        Forms\Components\Toggle::make('deactive_at_toggle')
                            ->disabled(function ($record) {
                                return $record->id == 1 || $record->role_id == 1;
                            })
                            ->label(__("keys.status"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("deactive_at_time")
                            ->visibleOn('view')
                            ->label(__("keys.deactive_at"))
                            ->translateLabel(),
                    ])
                    ->visibleOn(["view", "edit"])
                    ->columns(2),
                Section::make(__("keys.User personal info"))
                    ->schema([
                        Forms\Components\TextInput::make("first_name")
                            ->required()
                            ->minLength(2)
                            ->maxLength(80)
                            ->label(__("keys.first name"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("mid_name")
                            ->minLength(2)
                            ->maxLength(80)
                            ->label(__("keys.middle name"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("last_name")
                            ->required()
                            ->minLength(2)
                            ->maxLength(80)
                            ->label(__("keys.last name"))
                            ->translateLabel(),
                        Forms\Components\Select::make("role_id")
                            ->required()
                            ->relationship("role", "name")
                            ->options(function () {
                                return Role::whereNot('id', 3)->orderBy("id")->pluck("name", "id")->toArray();
                            })
                            ->preload()
                            ->searchable()
                            ->label(__("keys.role"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("email")
                            ->required()
                            ->email()
                            ->unique("users", "email", ignoreRecord: true)
                            ->label(__("keys.email"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("phone_number")
                            ->required()
                            ->tel()
                            ->telRegex("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,8}$/")
                            ->unique("users", "phone_number", ignoreRecord: true)
                            ->label(__("keys.phone number"))
                            ->translateLabel(),
                        Forms\Components\Select::make('country_id')
                            ->required()
                            ->relationship(name: 'country', titleAttribute: 'name_' . app()->getLocale())
                            ->searchable(['name_ar', 'name_en'])
                            ->optionsLimit(500)
                            ->preload()
                            ->label(__("keys.country"))
                            ->translateLabel(),
                        Forms\Components\Select::make('state_id')
                            ->relationship(name: 'state', titleAttribute: 'name_' . app()->getLocale())
                            ->searchable(['name_ar', 'name_en'])
                            ->optionsLimit(500)
                            ->preload()
                            ->label(__("keys.state"))
                            ->translateLabel(),
                        Forms\Components\DatePicker::make("birth_date")
                            ->required()
                            ->beforeOrEqual(Carbon::now()->subYears(18)->format("Y-m-d"))
                            ->label(__("keys.birth date"))
                            ->translateLabel(),
                    ])
                    ->columns(3),
                Section::make(__("keys.User Account Info"))
                    ->schema([
                        Forms\Components\TextInput::make("account_name")
                            ->required()
                            ->minLength(5)
                            ->maxLength(50)
                            ->hint("user-admin")
                            ->unique('users', 'account_name', ignoreRecord: true)
                            ->regex("/^[A-Za-z](?!.*?[-_]{2})[A-Za-z0-9_-]{4,30}[A-Za-z0-9]$/")
                            ->label(__("keys.account name"))
                            ->translateLabel(),
                        PasswordFiled::make("password")
                            ->required(fn($operation) => $operation === 'create')
                            ->minLength(8)
                            ->maxLength(255)
                            ->rules(function () {
                                return PasswordRules::min(8)->letters()->numbers();
                            })
                            ->password()
                            ->autocomplete(false)
                            ->label(__("keys.password"))
                            ->translateLabel(),
                        PasswordFiled::make("password_confirmation")
                            ->required(fn($operation) => $operation === 'create')
                            ->password()
                            ->autocomplete(false)
                            ->same('password')
                            ->label(__("keys.password confirmation"))
                            ->translateLabel(),
                    ])
                    ->columns(3),
                FileUpload::make('img_url')
                    ->image()
                    ->maxSize(2048)
                    ->directory("users/profiles-images/admins/")
                    ->acceptedFileTypes(['image/png', 'image/jpg', 'image/gif', 'image/jpeg'])
                    ->imageEditor()
                    ->moveFiles()
                    ->imageEditorEmptyFillColor('#333')
                    ->columnSpanFull()
                    ->resize(50)
                    ->label(__("keys.main_image"))
                    ->translateLabel(),
                Forms\Components\Textarea::make('about_user')
                    ->columnSpanFull()
                    ->maxLength(1000)
                    ->rows(4)
                    ->autosize()
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
                Tables\Columns\ToggleColumn::make('deactive_at')
                    ->updateStateUsing(function ($record) {
                        if ($record->deactive_at == null) {
                            $record->deactive_at = Carbon::now();
                            $record->save();
                        } else {
                            $record->deactive_at = null;
                            $record->save();
                        }
                    })
                    ->getStateUsing(function ($record) {
                        if ($record->deactive_at) return false;
                        return true;
                    })
                    ->disabled(function ($record) {
                        return $record->id == 1 || $record->role_id == 1 || empty(array_intersect(Auth()->user()->role->abilities->pluck('id')->toArray(), [1, 3]));
                    })
                    ->label(__("keys.active"))
                    ->translateLabel(),
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at'),
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
                SelectFilter::make(name: 'role_id')
                    ->preload()
                    ->relationship(name: 'role', titleAttribute: 'name', modifyQueryUsing: fn(Builder $query) => $query->whereNot("id", 3))
                    ->searchable()
                    ->multiple()
                    ->optionsLimit('50')
                    ->label(__("keys.roles"))
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'view' => Pages\ViewAdmin::route('/{record}'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.admins');
    }

    public static function getModelLabel(): string
    {
        return __('keys.admin');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.admins');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system users');
    }
}
