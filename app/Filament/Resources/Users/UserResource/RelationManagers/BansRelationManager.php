<?php

namespace App\Filament\Resources\Users\UserResource\RelationManagers;

use App\Filament\Resources\Users\AdminResource;
use App\Models\Administration\Log\BanLog;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Table;
use App\Traits\FilamentComponentsTrait;
use App\Traits\PublicStyles;
use Carbon\Carbon;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Queue\Jobs\DatabaseJob;
use Illuminate\Support\HtmlString;

class BansRelationManager extends RelationManager
{
    use FilamentComponentsTrait;
    protected static string $relationship = 'bans';

    protected $listeners = ['refreshBanLog' => '$refresh'];

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('keys.ban log');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Placeholder::make("user.name")
                            ->label(__("keys.created_by"))
                            ->translateLabel()
                            ->content(function ($record): HtmlString|string {
                                if ($record->banned_by_id)
                                    return new HtmlString('<a href="' . AdminResource::getUrl('view', [$record->banned_by_id]) . '">' . $record->banningUser?->name . '</a>');
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
                    ->visibleOn("view")
                    ->columns(3),
                Forms\Components\TextInput::make("reason")
                    ->required()
                    ->minLength(1)
                    ->maxLength(600)
                    ->columnSpanFull()
                    ->label(__("keys.reason"))
                    ->translateLabel(),
                DateTimePicker::make('banned_until')
                    ->required()
                    ->native(false)
                    ->before(Carbon::now()->addYears(500)->format("Y-m-d"))
                    ->after(Carbon::now()->format('Y-m-d'))
                    ->label(__("keys.banned_until"))
                    ->translateLabel(),
                Forms\Components\TextInput::make('is_auto')
                    ->label(__("keys.auto ban"))
                    ->translateLabel(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user_id')
            ->columns([
                Tables\Columns\TextColumn::make('banningUser.name')
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
                    ->lineClamp(2)
                    ->extraAttributes(["style" => "width:200px;"])
                    ->label(__("keys.reason"))
                    ->translateLabel(),
                self::getDateTableComponent('banned_until', 'banned_until', 'Y/m/d H:i', false, isToggledHiddenByDefault: false),
                self::getDateTableComponent(isToggledHiddenByDefault: false),
                self::getDateTableComponent('updated_at', 'updated_at', isToggledHiddenByDefault: false),
            ])->defaultSort('updated_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make()->fillForm(function ($record) {
                    return [
                        "created_at" => Carbon::parse($record->created_at)->format("Y-m-d H:i:s"),
                        "updated_at" => Carbon::parse($record->updated_at)->format("Y-m-d H:i:s"),
                        "reason" => $record->reason,
                        "banned_until" => Carbon::parse($record->updated_at)->format("Y-m-d H:i"),
                        "is_auto" => $record->is_auto ? __("keys.yes") : __("keys.no"),
                    ];
                }),
            ]);
    }

    public static function getModelLabel(): string
    {
        return __('keys.ban log');
    }
}