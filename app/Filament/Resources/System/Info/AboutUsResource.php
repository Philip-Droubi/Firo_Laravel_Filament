<?php

namespace App\Filament\Resources\System\Info;

use App\Filament\Resources\System\Info\AboutUsResource\Pages;
use App\Filament\Resources\System\Info\AboutUsResource\RelationManagers;
use App\Filament\Resources\UserResource;
use App\Models\System\Info\AboutUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class AboutUsResource extends Resource
{
    protected static ?string $model = AboutUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?int $navigationSort = 2;

    protected static ?string $slug = 'about-us';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('lang')
                    ->required()
                    ->unique('about_us', 'lang', ignoreRecord: true)
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
                    ->url(function (AboutUs $record): string {
                        return
                            $record->last_update_by ?
                            UserResource::getUrl('view', [$record->last_update_by])
                            : "";
                    }),
                Tables\Columns\TextColumn::make('text')
                    ->limit(80)
                    ->lineClamp(2)
                    ->formatStateUsing(fn(string $state): HtmlString => new HtmlString($state))
                    ->label(__("keys.text"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('keys.created_at'))
                    ->translateLabel()
                    ->dateTime('Y-m-d h:i a')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('keys.updated_at'))
                    ->translateLabel()
                    ->dateTime('Y-m-d h:i a')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAboutUs::route('/'),
            // 'create' => Pages\CreateAboutUs::route('/create'),
            // 'view' => Pages\ViewAboutUs::route('/{record}'),
            // 'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.about us');
    }

    public static function getModelLabel(): string
    {
        return __('keys.item');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.about us');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system info');
    }
}
