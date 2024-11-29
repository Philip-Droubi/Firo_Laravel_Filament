<?php

namespace App\Enums;

enum ReportableTypes: string
{
    case PROFILE = 'App\Models\User';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getStatusSelectionItems(): array
    {
        $statusSelectionItems = [
            self::PROFILE->value => __('reports.' . self::PROFILE->value),
        ];

        return $statusSelectionItems;
    }
}
