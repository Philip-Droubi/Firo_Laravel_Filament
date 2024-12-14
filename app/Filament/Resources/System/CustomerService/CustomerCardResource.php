<?php

namespace App\Filament\Resources\System\CustomerService;

use App\Filament\Resources\System\CustomerService\CustomerCardResource\Pages;
use App\Filament\Resources\System\CustomerService\CustomerCardResource\RelationManagers;
use App\Models\System\CustomerService\CustomerCard;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Classes\BaseResource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerCardResource extends BaseResource
{
    protected static ?string $model = CustomerCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCustomerCards::route('/'),
            'create' => Pages\CreateCustomerCard::route('/create'),
            'view' => Pages\ViewCustomerCard::route('/{record}'),
            'edit' => Pages\EditCustomerCard::route('/{record}/edit'),
        ];
    }
}
