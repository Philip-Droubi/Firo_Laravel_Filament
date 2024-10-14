<?php

namespace App\Filament\Resources\Administration\App;

use App\Filament\Resources\Administration\App\DefinedSkillResource\Pages;
use App\Filament\Resources\Administration\App\DefinedSkillResource\RelationManagers;
use App\Models\Administration\App\DefinedSkill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DefinedSkillResource extends Resource
{
    protected static ?string $model = DefinedSkill::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->unique('defined_skills', 'name', ignoreRecord: true)
                    ->maxLength(255)
                    ->label(__("keys.name"))
                    ->translateLabel(),
                Forms\Components\TextInput::make('description')
                    ->maxLength(length: 500)
                    ->default(null)
                    ->label(__("keys.description"))
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
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->label(__("keys.description"))
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultPaginationPageOption(25)
            ->defaultSort('name');
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
            'index' => Pages\ListDefinedSkills::route('/'),
            // 'create' => Pages\CreateDefinedSkill::route('/create'),
            // 'edit' => Pages\EditDefinedSkill::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.skills');
    }

    public static function getModelLabel(): string
    {
        return __('keys.skill');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.skills');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system management');
    }
}
