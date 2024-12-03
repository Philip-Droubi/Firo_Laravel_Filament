<?php

namespace App\Filament\Resources\System\Report;

use App\Enums\ReportableTypes;
use App\Filament\Resources\System\Report\UserReportResource\Pages;
use App\Filament\Resources\System\Report\UserReportResource\RelationManagers;
use App\Models\System\Report\UserReport;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use App\Filament\Resources\Users\UserResource;
use App\Models\System\Report\MainReport;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserReportResource extends BaseResource
{
    protected static ?string $model = UserReport::class;

    protected static ?string $navigationIcon = 'eos-report';

    protected static ?int $navigationSort = 3;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reporter.name')
                    ->url(function (UserReport $record): string {
                        return
                            $record->reporter_id ?
                            UserResource::getUrl('view', [$record->reporter_id])
                            : "";
                    })
                    ->searchable(query: function (Builder $query, $search): Builder {
                        return $query->withWhereHas('reporter', function ($q) use ($search) {
                            $q->searchName($search);
                        });
                    }, isIndividual: true)
                    ->label(__("keys.reporter name"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('reported.name')
                    ->url(function (UserReport $record): string {
                        return
                            $record->reported_id ?
                            UserResource::getUrl('view', [$record->reported_id])
                            : "";
                    })
                    ->searchable(query: function (Builder $query, $search): Builder {
                        return $query->withWhereHas('reported', function ($q) use ($search) {
                            $q->searchName($search);
                        });
                    }, isIndividual: true)
                    ->label(__("keys.reported name"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('report.name')
                    ->label('keys.report')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('reportable_type')
                    ->getStateUsing(function ($record) {
                        return __("reports.{$record->reportable_type} case");
                    })
                    ->label(__("keys.report case"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('reportable_id')
                    ->getStateUsing(fn($record) => self::getReportableLabel($record))
                    ->url(fn($record) => self::getReportableUrl($record))
                    ->label(__("keys.report on"))
                    ->searchable(),
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at')
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('reportable_type')
                    ->multiple()
                    ->options(ReportableTypes::getStatusSelectionItems())
                    ->label(__("keys.reports on"))
                    ->translateLabel(),
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
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getReportableUrl($record)
    {
        switch ($record->reportable_type) {
            case ReportableTypes::PROFILE->value:
                return UserResource::getUrl('view', [$record->reported_id]);
            default:
                return "#";
        }
    }

    public static function getReportableLabel($record)
    {
        switch ($record->reportable_type) {
            case ReportableTypes::PROFILE->value:
                return __("reports.:name profile", ["name" => $record->reporter->first_name]);
            default:
                return __("reports.Unknown");
        }
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserReports::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.reports');
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
        return __('keys.system users');
    }
}