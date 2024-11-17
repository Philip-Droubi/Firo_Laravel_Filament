<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\AdminResource\Pages;
use App\Models\System\Roles\Role;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rules\Password  as PasswordRules;
use Rawilk\FilamentPasswordInput\Password as PasswordFiled;
use Filament\Forms\Components\FileUpload;

class AdminResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'eos-admin-o';

    protected static ?int $navigationSort = 2;

    protected static ?string $slug = 'admins';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereNot('role_id', 3);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                                return Role::whereNot('id', 3)->pluck("name", "id")->toArray();
                            })
                            ->preload()
                            ->searchable()
                            ->label(__("keys.role"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("email")
                            ->required()
                            ->email()
                            ->unique("users", "email")
                            ->label(__("keys.email"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make("phone_number")
                            ->required()
                            ->tel()
                            ->telRegex("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,8}$/")
                            ->unique("users", "phone_number")
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
                            ->unique('users', 'account_name')
                            ->regex("/^[A-Za-z](?!.*?[-_]{2})[A-Za-z0-9_-]{4,30}[A-Za-z0-9]$/")
                            ->label(__("keys.account name"))
                            ->translateLabel(),
                        PasswordFiled::make("password")
                            ->required()
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
                            ->required()
                            ->password()
                            ->autocomplete(false)
                            ->same('password')
                            ->label(__("keys.password confirmation"))
                            ->translateLabel(),
                    ])
                    ->columns(3),
                FileUpload::make('main_img_url')
                    ->image()
                    ->maxSize(2048)
                    ->directory(directory: function ($record) {
                        return "users/profiles/" . $record->id;
                    })
                    ->acceptedFileTypes(['image/png', 'image/jpg', 'image/gif', 'image/jpeg'])
                    ->imageEditor()
                    ->moveFiles()
                    ->imageEditorEmptyFillColor('#333')
                    ->columnSpanFull()
                    ->resize(50)
                    ->label(__("keys.main_image"))
                    ->translateLabel(),
                Forms\Components\Textarea::make('about user')
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
                    ->searchable()
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
                    ->label(__("keys.account name"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label(__("keys.email"))
                    ->icon('eos-email')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->toggleable()
                    ->icon('eos-phone')
                    ->label(__("keys.phone number"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('last_seen')
                    ->toggleable()
                    ->dateTime('Y-m-d h:i a')
                    ->sortable()
                    ->label(__("keys.last seen"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('adminProfile.creator.name')
                    ->label(__("keys.created_by"))
                    ->translateLabel()
                    ->url(function (User $record): string {
                        return
                            $record->adminProfile->created_by ?
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
                        return $record->id == 1 || $record->role_id == 1;
                    })
                    ->label(__("keys.active"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('keys.created_at'))
                    ->translateLabel()
                    ->dateTime('Y-m-d h:i a')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('keys.updated_at'))
                    ->translateLabel()
                    ->dateTime('Y-m-d h:i a')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
