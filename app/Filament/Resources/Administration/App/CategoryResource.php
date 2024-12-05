<?php

namespace App\Filament\Resources\Administration\App;

use App\Filament\Classes\BaseResource;
use App\Filament\Resources\Administration\App\CategoryResource\Pages;
use App\Models\Administration\App\Category;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;

class CategoryResource extends BaseResource
{
    use Translatable;
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?int $navigationSort = 6;

    protected static ?string $slug = 'categories';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->rules([
                        fn(Get $get) => UniqueTranslationRule::for('categories', 'name')->ignore($get('id'))
                    ])
                    ->label(__("keys.name"))
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label(__("keys.name"))
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
            ])->defaultSort("name");
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.categories');
    }

    public static function getModelLabel(): string
    {
        return __('keys.category');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.categories');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system management');
    }
}