<?php

namespace App\Filament\Resources\System\Info;

use App\Filament\Resources\System\Info\TosResource\Pages;
use App\Filament\Resources\Users\AdminResource;
use App\Models\System\Info\Tos;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class TosResource extends BaseResource
{
    protected static ?string $model = Tos::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?int $navigationSort = 3;

    protected static ?string $slug = 'tos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('lang')
                    ->required()
                    ->unique('tos', 'lang', ignoreRecord: true)
                    ->options(config("custom.accepted_languages_options"))
                    ->label(__("keys.lang"))
                    ->translateLabel(),
                Forms\Components\RichEditor::make('text')
                    ->required()
                    ->minLength(2)
                    ->maxLength(60000)
                    ->label(__(key: "keys.text"))
                    ->translateLabel()
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lang')
                    ->label(__("keys.lang"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('updated_by.name')
                    ->label(__("keys.last_updated_by"))
                    ->translateLabel()
                    ->url(function (Tos $record): string {
                        return
                            $record->last_update_by ?
                            AdminResource::getUrl('view', [$record->last_update_by])
                            : "";
                    }),
                Tables\Columns\TextColumn::make('text')
                    ->limit(80)
                    ->lineClamp(2)
                    ->formatStateUsing(fn(string $state): HtmlString => new HtmlString($state))
                    ->label(__("keys.text"))
                    ->translateLabel(),
                self::getDateTableComponent(),
                self::getDateTableComponent('updated_at', 'updated_at')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['last_update_by'] = auth()->id();
                        return $data;
                    }),
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
            'index' => Pages\ListTos::route('/'),
            // 'create' => Pages\CreateTos::route('/create'),
            // 'view' => Pages\ViewTos::route('/{record}'),
            // 'edit' => Pages\EditTos::route('/{record}/edit'),
        ];
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.term of services');
    }

    public static function getModelLabel(): string
    {
        return __('keys.item');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.term of services');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system info');
    }
}
