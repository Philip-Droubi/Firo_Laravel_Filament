<?php

namespace App\Filament\Classes;

use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;

class BaseResource extends Resource
{
    protected static function getDateTableComponent(string $fieldName = 'created_at', string $label = 'created_at', string $dateTime = 'Y-m-d g:i a', bool $sortable = true, bool $isToggledHiddenByDefault = true): TextColumn
    {
        return TextColumn::make($fieldName)
            ->label(__("keys.{$label}"))
            ->translateLabel()
            ->dateTime($dateTime)
            ->sortable($sortable)
            ->toggleable(isToggledHiddenByDefault: $isToggledHiddenByDefault);
    }
}