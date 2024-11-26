<?php

namespace App\Filament\Resources\Users\UserResource\RelationManagers;

use App\Filament\Resources\Administration\Log\BanLogResource;
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
        return BanLogResource::form($form);
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
                    $record["is_auto"] = $record->is_auto ? __("keys.yes") : __("keys.no");
                    return $record->toArray();
                }),
            ]);
    }

    public static function getModelLabel(): string
    {
        return __('keys.ban log');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.items');
    }
}
