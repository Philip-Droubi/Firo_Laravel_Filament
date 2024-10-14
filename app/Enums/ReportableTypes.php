<?php

namespace App\Enums;

enum ReportableTypes: string
{
    case PROFILE = 'App\Models\User';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
