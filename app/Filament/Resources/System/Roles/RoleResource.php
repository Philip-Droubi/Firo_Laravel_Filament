<?php

namespace App\Filament\Resources\System\Roles;

use App\Filament\Resources\System\Roles\RoleResource\Pages;
use App\Filament\Resources\Users\UserResource;
use App\Models\System\Roles\Role;
use App\Models\User;
use Awcodes\FilamentBadgeableColumn\Components\BadgeableColumn;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use Filament\Tables;
use Filament\Tables\Table;

class RoleResource extends BaseResource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->minLength(2)
                    ->maxLength(60)
                    ->unique(table: 'roles', column: 'name', ignoreRecord: true)
                    ->columnSpanFull()
                    ->label(__("keys.name"))
                    ->translateLabel(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull()
                    ->maxLength(255)
                    ->rows(4)
                    ->label(__(key: "keys.description"))
                    ->translateLabel(),
                Forms\Components\Select::make('abilities')
                    ->multiple()
                    ->relationship('abilities', 'name')
                    ->preload()
                    ->searchable()
                    ->columnSpanFull()
                    ->label(__(key: "keys.abilities"))
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label(__("keys.name"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('creator.name')
                    ->label(__("keys.created_by"))
                    ->translateLabel()
                    ->url(function (Role $record): string {
                        return
                            $record->created_by ?
                            UserResource::getUrl('view', [$record->created_by])
                            : "";
                    }),
                Tables\Columns\TextColumn::make('description')
                    ->wrap()
                    ->lineClamp(2)
                    ->label(__("keys.description"))
                    ->translateLabel(),
                BadgeableColumn::make("abilities.name")
                    ->badge()
                    ->color('success')
                    ->extraAttributes(["style" => 'margin-top:10px']),
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->hidden(fn($record) => in_array($record->id, [1, 2, 3])),
                Tables\Actions\DeleteAction::make()
                    ->hidden(fn($record) => in_array($record->id, [1, 2, 3]))
                    ->before(function ($record) {
                        User::where("role_id", $record->id)->update([
                            "role_id" => 2
                        ]);
                    }),
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
            'index' => Pages\ListRoles::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.roles');
    }

    public static function getModelLabel(): string
    {
        return __('keys.role');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.roles');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system management');
    }
}