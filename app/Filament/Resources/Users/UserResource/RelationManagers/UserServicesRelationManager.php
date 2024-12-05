<?php

namespace App\Filament\Resources\Users\UserResource\RelationManagers;

use App\Filament\Resources\Users\Service\UserServiceResource;
use App\Traits\FilamentComponentsTrait;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class UserServicesRelationManager extends RelationManager
{
    use FilamentComponentsTrait;
    protected static string $relationship = 'services';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('keys.user services');
    }

    public static function getBadge(Model $ownerRecord, string $pageClass): ?string
    {
        return $ownerRecord->services()->count();
    }

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return UserServiceResource::form($form);
    }

    public function table(Table $table): Table
    {
        return UserServiceResource::table($table);
    }

    public static function getModelLabel(): string
    {
        return __('keys.user service');
    }

    public static function getPluralModelLabel(): string
    {
        return __('keys.users services');
    }
}