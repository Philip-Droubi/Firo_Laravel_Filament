<?php

namespace App\Filament\Resources\System\Info;

use App\Enums\ContactTypes;
use App\Filament\Resources\System\Info\ContactUsResource\Pages;
use App\Filament\Resources\UserResource;
use App\Models\System\Info\ContactUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Infolists;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Traits\PublicStyles;
use Filament\Tables\Filters\SelectFilter;

class ContactUsResource extends Resource
{
    use PublicStyles;
    protected static ?string $model = ContactUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?int $navigationSort = 1;

    protected static ?string $slug = 'contact-us';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options(ContactTypes::values())
                    ->required()
                    ->label(__("keys.type"))
                    ->translateLabel()
                    ->searchable(condition: ['name_ar', 'name_en'])
                    ->preload(),
                Forms\Components\TextInput::make('link')
                    ->required()
                    ->unique('contact_us', 'link')
                    ->minLength(2)
                    ->maxLength(600)
                    ->label(__("keys.link"))
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->label(__("keys.type"))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('creator.name')
                    ->label(__("keys.created_by"))
                    ->translateLabel()
                    ->url(function (ContactUs $record): string {
                        return
                            $record->created_by ?
                            UserResource::getUrl('view', [$record->created_by])
                            : "";
                    }),
                Tables\Columns\TextColumn::make('link')
                    ->searchable()
                    ->label(__("keys.link"))
                    ->translateLabel()
                    ->copyable(),
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
                SelectFilter::make('type')
                    ->multiple()
                    ->options(ContactTypes::getStatusSelectionItems())
                    ->label(__("keys.type"))
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['created_by'] = auth()->id();
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('type')
                    ->label(__("keys.type"))
                    ->translateLabel()
                    ->extraAttributes(function (ContactUs $record) {
                        return ['style' => (new class {
                            use PublicStyles;
                        })->getInfolistFieldStyle()];
                    }),
                Infolists\Components\TextEntry::make('link')
                    ->label(__("keys.link"))
                    ->translateLabel()
                    ->copyable()
                    ->extraAttributes(function (ContactUs $record) {
                        return ['style' => (new class {
                            use PublicStyles;
                        })->getInfolistFieldStyle()];
                    }),
                Infolists\Components\TextEntry::make('created_at')
                    ->dateTime('Y-m-d h:i a')->label(__("keys.created_at"))
                    ->translateLabel()
                    ->extraAttributes(function (ContactUs $record) {
                        return ['style' => (new class {
                            use PublicStyles;
                        })->getInfolistFieldStyle()];
                    }),
                Infolists\Components\TextEntry::make('creator.name')
                    ->label(__("keys.created_by"))
                    ->translateLabel()
                    ->url(fn(ContactUs $record): string => UserResource::getUrl('view', [$record->created_by]))
                    ->extraAttributes(['style' => (new class {
                        use PublicStyles;
                    })->getInfolistFieldStyle()]),
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
            'index' => Pages\ListContactUs::route('/'),
        ];
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public static function getNavigationLabel(): string
    {
        return __('keys.contact us');
    }

    public static function getModelLabel(): string
    {
        return __('keys.contact');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.contacts');
    }

    public static function getNavigationGroup(): string
    {
        return __('keys.system info');
    }
}
