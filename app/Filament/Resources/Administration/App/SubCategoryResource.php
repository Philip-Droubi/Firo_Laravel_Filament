<?php

namespace App\Filament\Resources\Administration\App;

use App\Filament\Resources\Administration\App\SubCategoryResource\Pages;
use App\Filament\Resources\Administration\App\SubCategoryResource\RelationManagers;
use App\Models\Administration\App\Category;
use App\Models\Administration\App\SubCategory;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubCategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = SubCategory::class;

    protected static ?string $navigationIcon = 'heroicon-s-tag';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('name')
                    ->required()
                    ->maxLength(255)
                    ->rules([
                        fn(Get $get) => UniqueTranslationRule::for('sub_categories', 'name')->ignore($get('id'))
                    ])
                    ->label(__("keys.name"))
                    ->translateLabel(),
                Forms\Components\Select::make('category_id')
                    ->required()
                    ->relationship(name: 'category', titleAttribute: 'name')
                    ->searchable(['name'])
                    ->preload()
                    ->label(__("keys.category"))
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
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->sortable()
                    ->label(__(key: "keys.category"))
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
                SelectFilter::make('type')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('category', 'name')
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->name)
                    ->indicateUsing(function (array $data): array {
                        return Category::query()->whereIn('id', $data['values'])->get()->pluck('name')->toArray();
                    })
                    ->label(__("keys.category"))
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
            'index' => Pages\ListSubCategories::route('/'),
            'create' => Pages\CreateSubCategory::route('/create'),
            'edit' => Pages\EditSubCategory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.sub categories');
    }

    public static function getModelLabel(): string
    {
        return __('keys.sub category');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.sub categories');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system management');
    }
}
