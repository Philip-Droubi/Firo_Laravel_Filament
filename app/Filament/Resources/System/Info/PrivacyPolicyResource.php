<?php

namespace App\Filament\Resources\System\Info;

use App\Filament\Resources\System\Info\PrivacyPolicyResource\Pages;
use App\Filament\Resources\System\Info\PrivacyPolicyResource\RelationManagers;
use App\Filament\Resources\UserResource;
use App\Models\System\Info\PrivacyPolicy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class PrivacyPolicyResource extends Resource
{
    protected static ?string $model = PrivacyPolicy::class;

    protected static ?string $navigationIcon = 'heroicon-s-shield-exclamation';

    protected static ?int $navigationSort = 4;

    protected static ?string $slug = 'privacy-policies';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('lang')
                    ->required()
                    ->unique('privacy_policies', 'lang', ignoreRecord: true)
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
                    ->url(function (PrivacyPolicy $record): string {
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
            'index' => Pages\ListPrivacyPolicies::route('/'),
            // 'create' => Pages\CreatePrivacyPolicy::route('/create'),
            // 'view' => Pages\ViewPrivacyPolicy::route('/{record}'),
            // 'edit' => Pages\EditPrivacyPolicy::route('/{record}/edit'),
        ];
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.privacy policies');
    }

    public static function getModelLabel(): string
    {
        return __('keys.item');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.privacy policies');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system info');
    }
}
