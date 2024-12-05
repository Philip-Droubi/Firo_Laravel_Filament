<?php

namespace App\Filament\Resources\System\Info;

use App\Filament\Resources\System\Info\CountryResource\Pages;
use App\Models\System\Info\Country;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use Filament\Tables;
use Filament\Tables\Table;

class CountryResource extends BaseResource
{
    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    // protected static ?string $navigationLabel = 'Country';

    // protected static ?string $modelLabel = 'System Country';

    // protected static ?string $navigationGroup = 'System Info';

    protected static ?string $slug = 'countries';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255)
                    ->minLength(2)
                    ->unique('countries', 'name_en', ignoreRecord: true)
                    ->label(__("keys.name_en"))
                    ->translateLabel(),
                Forms\Components\TextInput::make('name_ar')
                    ->required()
                    ->maxLength(255)
                    ->minLength(2)
                    ->unique('countries', 'name_ar', ignoreRecord: true)
                    ->label(__("keys.name_ar"))
                    ->translateLabel(),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255)
                    ->length(2)
                    ->unique('countries', 'code', ignoreRecord: true)
                    ->label(__("keys.country code"))
                    ->translateLabel(),
                Forms\Components\TextInput::make('dial_code')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(9999)
                    ->label(__("keys.dial code"))
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->searchable()
                    ->sortable()
                    ->label(__("keys.name_en"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('name_ar')
                    ->searchable()
                    ->sortable()
                    ->label(__("keys.name_ar"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable()
                    ->sortable()
                    ->label(__("keys.country code"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('dial_code')
                    ->searchable()
                    ->sortable()
                    ->label(__("keys.dial code"))
                    ->translateLabel(),
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultPaginationPageOption(25)
            ->defaultSort('name_en');
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
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.countries');
    }

    public static function getModelLabel(): string
    {
        return __('keys.country');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.countries');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system management');
    }
}