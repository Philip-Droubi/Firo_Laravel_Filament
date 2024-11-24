<?php

namespace App\Filament\Resources\Administration\App;

use App\Filament\Resources\Administration\App\AppFeatureResource\Pages;
use App\Filament\Resources\Users\UserResource;
use App\Models\Administration\App\AppFeature;
use App\Filament\Classes\BaseResource;
use Filament\Tables;
use Filament\Tables\Table;

class AppFeatureResource extends BaseResource
{
    protected static ?string $model = AppFeature::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    protected static ?int $navigationSort = 8;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label(__("keys.name"))
                    ->translateLabel(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->updateStateUsing(function (AppFeature $rec) {
                        $rec->is_active = !$rec->is_active;
                        $rec->updated_by = auth()->id();
                        $rec->save();
                    })
                    ->label(__('keys.active'))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('updater.name')
                    ->label(__("keys.updated_by"))
                    ->translateLabel()
                    ->url(function (AppFeature $record): string {
                        return
                            $record->updated_by ?
                            UserResource::getUrl('view', [$record->updated_by])
                            : "";
                    }),
                self::getDateTableComponent('updated_at', 'updated_at', isToggledHiddenByDefault: false)
            ])->paginated(false)
            ->defaultSort('name');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppFeatures::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.app features');
    }

    public static function getModelLabel(): string
    {
        return __('keys.feature');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.app features');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system management');
    }
}