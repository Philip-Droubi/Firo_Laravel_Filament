<?php

namespace App\Filament\Resources\System\Info;

use App\Filament\Resources\System\Info\StateResource\Pages;
use App\Models\System\Info\State;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Validation\Rules\Unique;

class StateResource extends BaseResource
{
    protected static ?string $model = State::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?int $navigationSort = 4;

    protected static ?string $slug = 'states';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('country_id')
                    ->required()
                    ->relationship(name: 'country', titleAttribute: 'name_' . app()->getLocale())
                    ->searchable(['name_ar', 'name_en'])
                    ->optionsLimit(500)
                    ->preload()
                    ->label(__("keys.country"))
                    ->translateLabel(),
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255)
                    ->minLength(2)
                    ->unique('states', 'name_en', modifyRuleUsing: function (Unique $rule, callable $get) {
                        return $rule->where('name_en', $get('name_en'))
                            ->where('country_id', $get('country_id'));
                    }, ignoreRecord: true)
                    ->label(__("keys.name_en"))
                    ->translateLabel(),
                Forms\Components\TextInput::make('name_ar')
                    ->required()
                    ->maxLength(255)
                    ->minLength(2)
                    ->unique('states', 'name_ar', modifyRuleUsing: function (Unique $rule, callable $get) {
                        return $rule->where('name_ar', $get('name_ar'))
                            ->where('country_id', $get('country_id'));
                    }, ignoreRecord: true)
                    ->label(__("keys.name_ar"))
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country.name_' . app()->getLocale())
                    ->searchable()
                    ->sortable()
                    ->label(__(key: "keys.country"))
                    ->translateLabel(),
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
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at')
            ])
            ->filters([
                SelectFilter::make('country.name_' . app()->getLocale())
                    ->preload()
                    ->relationship(name: 'country', titleAttribute: 'name_' . app()->getLocale())
                    ->searchable(['name_ar', 'name_en'])
                    ->multiple()
                    ->optionsLimit('500')
                    ->label(__("keys.country"))
                    ->translateLabel(),
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
            'index' => Pages\ListStates::route('/'),
            'create' => Pages\CreateState::route('/create'),
            'edit' => Pages\EditState::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.states');
    }

    public static function getModelLabel(): string
    {
        return __('keys.state');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.states');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system management');
    }
}