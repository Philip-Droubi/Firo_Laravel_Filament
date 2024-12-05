<?php

namespace App\Filament\Resources\System\Report;

use App\Filament\Resources\System\Report\MainReportResource\Pages;
use App\Models\System\Report\MainReport;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Classes\BaseResource;
use Filament\Tables;
use Filament\Tables\Table;

class MainReportResource extends BaseResource
{
    use Translatable;
    protected static ?string $model = MainReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    protected static ?string $slug = 'main-reports';

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