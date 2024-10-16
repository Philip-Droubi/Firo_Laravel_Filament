<?php

namespace App\Filament\Resources\System\Report;

use App\Filament\Resources\System\Report\MainReportResource\Pages;
use App\Filament\Resources\System\Report\MainReportResource\RelationManagers;
use App\Models\System\Report\MainReport;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MainReportResource extends Resource
{
    use Translatable;
    protected static ?string $model = MainReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name: 'name')
                    ->required()
                    ->string()
                    ->columnSpanFull()
                    ->maxLength(150)
                    ->rules([
                        fn(Get $get) => UniqueTranslationRule::for('main_reports', 'name')->ignore($get('id'))
                    ])
                    ->label(__("keys.text"))
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label(__("keys.text"))
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
            'index' => Pages\ListMainReports::route('/'),
            'create' => Pages\CreateMainReport::route('/create'),
            'edit' => Pages\EditMainReport::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.main reports');
    }

    public static function getModelLabel(): string
    {
        return __('keys.report');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.reports');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system management');
    }
}
