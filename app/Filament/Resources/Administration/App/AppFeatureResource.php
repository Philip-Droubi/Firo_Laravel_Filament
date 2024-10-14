<?php

namespace App\Filament\Resources\Administration\App;

use App\Filament\Resources\Administration\App\AppFeatureResource\Pages;
use App\Filament\Resources\Administration\App\AppFeatureResource\RelationManagers;
use App\Filament\Resources\UserResource;
use App\Models\Administration\App\AppFeature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppFeatureResource extends Resource
{
    protected static ?string $model = AppFeature::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    protected static ?int $navigationSort = 7;

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
                            $record->created_by ?
                            UserResource::getUrl('view', [$record->updated_by])
                            : "";
                    }),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('keys.updated_at'))
                    ->translateLabel()
                    ->dateTime('Y-m-d h:i a')
                    ->sortable()
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
