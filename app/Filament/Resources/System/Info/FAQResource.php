<?php

namespace App\Filament\Resources\System\Info;

use App\Filament\Resources\System\Info\FAQResource\Pages;
use App\Filament\Resources\Users\AdminResource;
use App\Models\System\Info\FAQ;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Classes\BaseResource;
use Filament\Tables;
use Filament\Tables\Table;

class FAQResource extends BaseResource
{
    use Translatable;
    protected static ?string $model = FAQ::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?int $navigationSort = 5;

    protected static ?string $slug = 'faq';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->required()
                    ->string()
                    ->columnSpanFull()
                    ->maxLength(255)
                    ->rules([
                        fn(Get $get) => UniqueTranslationRule::for('faq', 'question')->ignore($get('id'))
                    ])
                    ->label(__("keys.question"))
                    ->translateLabel(),
                Forms\Components\Textarea::make('answer')
                    ->required()
                    ->string()
                    ->columnSpanFull()
                    ->maxLength(1000)
                    ->autosize()
                    ->label(__("keys.answer"))
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->searchable()
                    ->limit(50)
                    ->label(__("keys.question"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('answer')
                    ->searchable()
                    ->limit(50)
                    ->label(__("keys.answer"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('updated_by.name')
                    ->label(__("keys.last_updated_by"))
                    ->translateLabel()
                    ->url(function (FAQ $record): string {
                        return
                            $record->last_update_by ?
                            AdminResource::getUrl('view', [$record->last_update_by])
                            : "";
                    }),
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
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListFAQS::route('/'),
            'create' => Pages\CreateFAQ::route('/create'),
            'view' => Pages\ViewFAQ::route('/{record}'),
            'edit' => Pages\EditFAQ::route('/{record}/edit'),
        ];
    }

    public static function getTranslatableLocales(): array
    {
        return config("custom.accepted_languages");
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public static function getNavigationLabel(): string
    {
        return ucwords(__('keys.faq'));
    }

    public static function getModelLabel(): string
    {
        return __('keys.item');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.faq');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system info');
    }
}
