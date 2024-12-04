<?php

namespace App\Filament\Resources\Users\Service;

use App\Filament\Resources\Users\Service\UserServiceResource\Pages;
use App\Models\Users\Service\UserService;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use App\Filament\Resources\Users\UserResource;
use App\Models\Administration\App\Category;
use App\Traits\PublicStyles;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\HtmlString;

class UserServiceResource extends BaseResource
{
    protected static ?string $model = UserService::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public static function getEloquentQuery(): EloquentBuilder
    {
        return parent::getEloquentQuery()->with(['user', 'category'])->withCount('reports');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->disabled()
            ->schema([
                Section::make()
                    ->schema([
                        Placeholder::make("user.name")
                            ->label(__("keys.created_by"))
                            ->translateLabel()
                            ->content(function ($record): HtmlString|string {
                                return new HtmlString('<a href="' . UserResource::getUrl('view', [$record->user_id]) . '">' . $record->user->name . '</a>');
                            })->extraAttributes(['style' => (new class {
                                use PublicStyles;
                            })->getInfolistFieldStyle()]),
                        Forms\Components\DateTimePicker::make("created_at")
                            ->label(__("keys.created_at"))
                            ->translateLabel(),
                        Forms\Components\DateTimePicker::make("updated_at")
                            ->label(__(key: "keys.updated_at"))
                            ->translateLabel(),
                    ])
                    ->columns(3),
                Section::make()
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->relationship(name: 'category', titleAttribute: 'name')
                            ->getOptionLabelFromRecordUsing(fn($record) => $record->name)
                            ->label(__("keys.category"))
                            ->translateLabel(),
                        Forms\Components\Toggle::make('is_visible')
                            ->hintIcon('heroicon-o-eye')
                            ->hintColor('warning')
                            ->label(__("keys.visibility"))
                            ->translateLabel(),
                    ])->columns(2),
                Section::make()
                    ->schema([
                        Forms\Components\Textarea::make('title')
                            ->autosize()
                            ->rows(1)
                            ->label(__("keys.title"))
                            ->translateLabel(),
                        Forms\Components\Textarea::make('body')
                            ->autosize()
                            ->label(__("keys.text"))
                            ->translateLabel(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable(isIndividual: true, query: function (QueryBuilder $query, $search): QueryBuilder {
                        return $query->whereHas('user', function ($q) use ($search) {
                            return $q->searchName($search);
                        });
                    })
                    ->url(function (UserService $record): string {
                        return UserResource::getUrl('view', [$record->user_id]);
                    })
                    ->label(__("keys.created_by"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable()
                    ->icon("heroicon-o-tag")
                    ->label(__("keys.category"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(isIndividual: true)
                    ->limit(40)
                    ->label(__("keys.title"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('body')
                    ->searchable()
                    ->wrap()
                    ->extraAttributes(["style" => 'width:260px'])
                    ->lineClamp(2)
                    ->label(__("keys.text"))
                    ->translateLabel(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label(__("keys.visible"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('reports_count')
                    ->sortable()
                    ->badge()
                    ->color(fn($record) => $record->reports_count > 0 ? "danger" : "success")
                    ->label(__("keys.reports count"))
                    ->translateLabel(),
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at'),
            ])
            ->filters([
                SelectFilter::make('is_visible')
                    ->options([
                        1 => __("keys.visible"),
                        2 => __("keys.invisible"),
                    ])
                    ->query(function (EloquentBuilder $query, $state) {
                        if ($state["value"] == 1) return $query->where("is_visible", true);
                        if ($state["value"] == 2) return $query->where("is_visible", false);
                    })
                    ->label(__("keys.visibility"))
                    ->translateLabel(),
                SelectFilter::make('category_id')
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUserServices::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.users services');
    }

    public static function getModelLabel(): string
    {
        return __('keys.user service');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.users services');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system services');
    }
}