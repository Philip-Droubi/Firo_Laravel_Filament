<?php

namespace App\Filament\Resources\System\CustomerService;

use App\Enums\CustomerServiceCardStatus;
use App\Enums\CustomerServiceTypes;
use App\Filament\Resources\System\CustomerService\CustomerCardResource\Pages;
use App\Models\System\CustomerService\CustomerCard;
use App\Traits\PublicStyles;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use App\Filament\Resources\Users\UserResource;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

class CustomerCardResource extends BaseResource
{
    protected static ?string $model = CustomerCard::class;

    protected static ?string $navigationIcon = 'ri-customer-service-2-line';

    protected static ?int $navigationSort = 3;

    protected static ?string $slug = 'customer-cards';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::whereNot('status', CustomerServiceCardStatus::CLOSED->value)->count() . " / " . static::getModel()::withTrashed()->count();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withTrashed()->withCount('messages')->with(['user']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__("keys.Creation Info"))->schema([
                    Placeholder::make("user.name")
                        ->label(__("keys.created_by"))
                        ->translateLabel()
                        ->content(
                            fn($record): HtmlString => new HtmlString('<a href="' . UserResource::getUrl('view', [$record->user_id]) . '">' . $record->user->name . '</a>')
                        )->extraAttributes(['style' => (new class {
                            use PublicStyles;
                        })->getInfolistFieldStyle()]),
                    Forms\Components\DateTimePicker::make("created_at")
                        ->label(__("keys.created_at"))
                        ->translateLabel(),
                    Forms\Components\DateTimePicker::make("updated_at")
                        ->label(__(key: "keys.updated_at"))
                        ->translateLabel(),
                    Forms\Components\DateTimePicker::make("deleted_at")
                        ->visible(fn($record): bool => $record->deleted_at != null)
                        ->label(__(key: "keys.deleted_at"))
                        ->translateLabel(),
                ])
                    ->collapsible()
                    ->columns(3),
                Section::make(__("keys.status info"))
                    ->schema([
                        Forms\Components\Toggle::make('is_private')
                            ->onColor('danger')
                            ->label(__("keys.private"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make('status')
                            ->label(__("keys.status"))
                            ->translateLabel(),
                        Forms\Components\TextInput::make('type')
                            ->label(__("keys.type"))
                            ->translateLabel(),
                    ])
                    ->columns(3)
                    ->collapsible(),
                Section::make(__("keys.title & description"))
                    ->schema([
                        Forms\Components\Textarea::make('title')
                            ->autosize()
                            ->rows(1)
                            ->label(__("keys.title"))
                            ->translateLabel(),
                        Forms\Components\Textarea::make('description')
                            ->autosize()
                            ->label(__("keys.description"))
                            ->translateLabel(),
                    ])
                    ->collapsible(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //User
                Tables\Columns\TextColumn::make('user.name')
                    ->url(fn(CustomerCard $record): string => UserResource::getUrl('view', [$record->user_id]))
                    ->searchable(query: function (Builder $query, $search): Builder {
                        return $query->withWhereHas('reporter', function ($q) use ($search) {
                            $q->searchName($search);
                        });
                    }, isIndividual: true)
                    ->label(__("keys.created_by"))
                    ->translateLabel(),
                //Title
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(40)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) <= $column->getCharacterLimit() ?
                            null : $state;
                    })
                    ->label(__("keys.title"))
                    ->translateLabel(),
                //Description
                Tables\Columns\TextColumn::make('description')
                    ->wrap()
                    ->lineClamp(2)
                    ->extraAttributes(["style" => 'width:210px'])
                    ->label(__("keys.description"))
                    ->translateLabel(),
                //Type
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->getStateUsing(fn($record) => __("keys.$record->type"))
                    ->extraAttributes(["style" => 'display:flex; align-items:center; justify-content:center'])
                    ->icon(fn($record) => $record->type == CustomerServiceTypes::BUG->value ? 'heroicon-o-bug-ant' : 'heroicon-o-question-mark-circle')
                    ->color(fn($record) => $record->type == CustomerServiceTypes::BUG->value ? 'danger' : 'warning')
                    ->label(__("keys.type"))
                    ->translateLabel(),
                //Status
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(fn($record) => __("keys.$record->status"))
                    ->extraAttributes(["style" => 'display:flex; align-items:center; justify-content:center'])
                    ->icon(fn($record) => $record->status == CustomerServiceCardStatus::OPEN->value ? 'heroicon-o-lock-open' : ($record->status == CustomerServiceCardStatus::PENDING->value ? 'heroicon-o-clock' : 'heroicon-o-lock-closed'))
                    ->color(fn($record) => $record->status == CustomerServiceCardStatus::OPEN->value ? 'success' : ($record->status == CustomerServiceCardStatus::PENDING->value ? 'warning' : 'danger'))
                    ->label(__("keys.status"))
                    ->translateLabel(),
                //Messages Count
                Tables\Columns\TextColumn::make('messages_count')
                    ->badge()
                    ->color(Color::Blue)
                    ->icon('eos-email-o')
                    ->extraAttributes(["style" => 'display:flex; align-items:center; justify-content:center'])
                    ->label(__("keys.messages count"))
                    ->translateLabel(),
                //Private
                Tables\Columns\IconColumn::make('is_private')
                    ->boolean()
                    ->extraAttributes(["style" => 'margin:auto'])
                    ->trueIcon('heroicon-o-lock-closed')
                    ->falseIcon('heroicon-o-lock-open')
                    ->tooltip(fn($record) => $record->is_private ? __("keys.private") : __("keys.public"))
                    ->color(fn($record) => $record->is_private ? 'danger' : 'success')
                    ->label(__("keys.private"))
                    ->translateLabel(),
                //Deleted
                Tables\Columns\IconColumn::make('deleted')
                    ->toggleable()
                    ->boolean()
                    ->extraAttributes(["style" => 'margin:auto'])
                    ->trueIcon('heroicon-s-trash')
                    ->getStateUsing(fn($record): bool => !!$record->deleted_at)
                    ->label(__("keys.deleted"))
                    ->translateLabel(),
                //Time
                self::getDateTableComponent('deleted_at', 'deleted_at'),
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at')
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('type')
                    ->options(CustomerServiceTypes::transValues())
                    ->query(function (Builder $query, $state): void {
                        if (!is_null($state['value']) && $state['value'] != "") {
                            $type = CustomerServiceTypes::transValues()[$state['value']];
                            $query->where(function ($q) use ($type) {
                                $q->where("type", array_search($type, trans(key: 'keys', locale: "en")))
                                    ->orWhere("type", array_search($type, trans(key: 'keys', locale: "ar")));
                            });
                        }
                    })
                    ->label(__("keys.type"))
                    ->translateLabel(),
                SelectFilter::make('status')
                    ->multiple()
                    ->options(CustomerServiceCardStatus::transValues())
                    ->query(function (Builder $query, $state): void {
                        if (!empty($state['values'])) {
                            $statuses = [];
                            foreach ($state['values'] as $value) {
                                $status = CustomerServiceCardStatus::transValues()[$value];
                                $statusVal = array_search($status, trans(key: 'keys', locale: "en"));
                                if (!$statusVal) $statusVal = array_search($status, trans(key: 'keys', locale: "ar"));
                                $statuses[] = $statusVal;
                            }
                            $query->whereIn('status', $statuses);
                        }
                    })
                    ->label(__("keys.status"))
                    ->translateLabel(),
                Filter::make('is_private')
                    ->query(fn(Builder $query): Builder => $query->where('is_private', true))
                    ->label(__("keys.private"))
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function ($record) {
                        $record->status = CustomerServiceCardStatus::CLOSED->value;
                        $record->save();
                    }),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->after(function ($records) {
                            CustomerCard::query()->withTrashed()->whereIn('id', $records->pluck('id')->toArray())->update([
                                'status' => CustomerServiceCardStatus::CLOSED->value,
                            ]);
                        }),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListCustomerCards::route('/'),
            'view' => Pages\ViewCustomerCard::route('/{record}'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return ucwords(__('keys.customer cards'));
    }

    public static function getModelLabel(): string
    {
        return __('keys.customer card');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.customers cards');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system users');
    }
}
