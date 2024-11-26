<?php

namespace App\Filament\Resources\Administration\Log;

use App\Filament\Resources\Administration\Log\BanLogResource\Pages;
use App\Models\Administration\Log\BanLog;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Classes\BaseResource;
use App\Filament\Resources\Users\AdminResource;
use App\Filament\Resources\Users\UserResource;
use App\Models\Administration\App\DefinedSkill;
use App\Models\User;
use App\Traits\PublicStyles;
use Carbon\Carbon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class BanLogResource extends BaseResource
{
    protected static ?string $model = BanLog::class;

    protected static ?string $navigationIcon = 'fas-user-slash';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Placeholder::make("banningUser.name")
                            ->label(__("keys.created_by"))
                            ->translateLabel()
                            ->content(function ($record): HtmlString|string {
                                if ($record->banned_by_id)
                                    return new HtmlString('<a href="' . AdminResource::getUrl('view', [$record->banned_by_id]) . '">' . $record->banningUser?->name . '</a>');
                                return "N/A";
                            })->extraAttributes(['style' => (new class {
                                use PublicStyles;
                            })->getInfolistFieldStyle()]),
                        Placeholder::make("bannedUser.name")
                            ->label(__("keys.banned_user"))
                            ->translateLabel()
                            ->content(function ($record): HtmlString|string {
                                if ($record->banned_id)
                                    return new HtmlString('<a href="' . UserResource::getUrl('view', [$record->banned_id]) . '">' . $record->bannedUser?->name . '</a>');
                                return "N/A";
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
                    ->visibleOn(["view", 'edit'])
                    ->disabled()
                    ->columns(2),
                Select::make('account_name')
                    ->preload()
                    ->searchable()
                    ->options(function () {
                        return User::query()->where("role_id", 3)
                            ->limit(5)
                            ->get(["id", "first_name", "last_name", "account_name"])
                            ->pluck("name", 'account_name')
                            ->toArray();
                    })
                    ->getSearchResultsUsing(function ($search) {
                        return User::query()->where("role_id", 3)
                            ->limit(5)
                            ->searchName($search)
                            ->get(["id", "first_name", "last_name", "account_name"])
                            ->pluck("name", 'account_name')
                            ->toArray();
                    })
                    ->optionsLimit(8)
                    ->live(debounce: 500)
                    ->label(__("keys.banned_user"))
                    ->translateLabel(),
                DateTimePicker::make('banned_until')
                    ->required()
                    ->native(false)
                    ->before(Carbon::now()->addYears(500)->format("Y-m-d"))
                    ->after(Carbon::now()->format('Y-m-d'))
                    ->label(__("keys.banned_until"))
                    ->translateLabel(),
                Forms\Components\TextInput::make('is_auto')
                    ->visibleOn('view')
                    ->label(__("keys.auto ban"))
                    ->translateLabel(),
                Forms\Components\Textarea::make("reason")
                    ->required()
                    ->rows(4)
                    ->minLength(1)
                    ->maxLength(600)
                    ->columnSpanFull()
                    ->label(__("keys.reason"))
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bannedUser.name')
                    ->searchable(query: function (Builder $query, $search): Builder {
                        return $query->whereHas('bannedUser', function (Builder $q) use ($search) {
                            return $q->searchName($search);
                        });
                    })
                    ->sortable()
                    ->label(__("keys.banned_user"))
                    ->translateLabel()
                    ->url(function (BanLog $record): string {
                        return
                            $record->banned_id ?
                            UserResource::getUrl('view', [$record->banned_id, 'activeRelationManager' => 2])
                            : "";
                    }),
                Tables\Columns\TextColumn::make('banningUser.name')
                    ->searchable(query: function (Builder $query, $search): Builder {
                        return $query->orWhereHas('banningUser', function (Builder $q) use ($search) {
                            return $q->searchName($search);
                        });
                    })
                    ->label(__("keys.created_by"))
                    ->translateLabel()
                    ->url(function (BanLog $record): string {
                        return
                            $record->banned_by_id ?
                            AdminResource::getUrl('view', [$record->banningUser])
                            : "";
                    }),
                Tables\Columns\IconColumn::make('is_auto')
                    ->boolean()
                    ->label(__("keys.auto ban"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('reason')
                    ->searchable()
                    ->lineClamp(2)
                    ->extraAttributes(["style" => "width:200px;"])
                    ->label(__("keys.reason"))
                    ->translateLabel(),
                self::getDateTableComponent('banned_until', 'banned_until', 'Y/m/d H:i', true, isToggledHiddenByDefault: false),
                self::getDateTableComponent(isToggledHiddenByDefault: false),
                self::getDateTableComponent('updated_at', 'updated_at', isToggledHiddenByDefault: false),
            ])->defaultSort('updated_at', 'desc')
            ->filters([
                Filter::make("is_auto")
                    ->query(fn(Builder $query): Builder => $query->where('is_auto', true))
                    ->label(__("keys.auto ban"))
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->fillForm(function ($record) {
                    $record["is_auto"] = $record->is_auto ? __("keys.yes") : __("keys.no");
                    return $record->toArray();
                }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanLogs::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.ban log');
    }

    public static function getModelLabel(): string
    {
        return __('keys.ban');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.items');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.logs');
    }
}
