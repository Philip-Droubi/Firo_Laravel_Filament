<?php

namespace App\Filament\Resources\Users\UserResource\RelationManagers;

use App\Traits\FilamentComponentsTrait;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PointsRelationManager extends RelationManager
{
    use FilamentComponentsTrait;

    protected static string $relationship = 'points';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('keys.points');
    }

    public static function getBadge(Model $ownerRecord, string $pageClass): ?string
    {
        return $ownerRecord->points()->sum('points');
    }

    public static function getBadgeColor(Model $ownerRecord, string $pageClass): ?string
    {
        if ($ownerRecord->points()->sum('points') < 0)
            return 'danger';
        return 'success';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user_id')
            ->columns([
                Tables\Columns\TextColumn::make('points')
                    ->sortable()
                    ->label(__("keys.user_points"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('case')
                    ->wrap()
                    ->getStateUsing(function ($record) {
                        return __("points.{$record->case}");
                    })
                    ->label(__("keys.case"))
                    ->translateLabel(),
                self::getDateTableComponent(isToggledHiddenByDefault: false),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])->defaultSort("created_at", "desc");
    }

    public static function getModelLabel(): string
    {
        return __('keys.points');
    }
}