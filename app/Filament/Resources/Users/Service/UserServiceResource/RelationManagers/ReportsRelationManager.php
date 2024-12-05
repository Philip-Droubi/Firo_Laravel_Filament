<?php

namespace App\Filament\Resources\Users\Service\UserServiceResource\RelationManagers;

use App\Filament\Resources\System\Report\UserReportResource;
use App\Models\System\Report\MainReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ReportsRelationManager extends RelationManager
{
    protected static string $relationship = 'reports';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('keys.reports');
    }

    public static function getBadge(Model $ownerRecord, string $pageClass): ?string
    {
        return $ownerRecord->reports()->count();
    }

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return UserReportResource::table($table)->filters([
            SelectFilter::make('report.name')
                ->multiple()
                ->preload()
                ->relationship('report', 'name')
                ->getOptionLabelFromRecordUsing(fn($record) => $record->name)
                ->indicateUsing(function (array $data): array {
                    return MainReport::query()->whereIn('id', $data['values'])->get()->pluck('name')->toArray();
                })
                ->label(__("keys.report type"))
                ->translateLabel(),
        ]);
    }

    public static function getModelLabel(): string
    {
        return __('keys.report');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.reports');
    }
}