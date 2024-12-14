<?php

namespace App\Enums;

enum CustomerServiceCardStatus: string
{
    case PENDING = 'pending';
    case OPEN = 'open';
    case CLOSED = 'closed';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getStatusSelectionItems(): array
    {
        $statusSelectionItems = [
            self::PENDING->value => 'Pending',
            self::OPEN->value => 'Open',
            self::CLOSED->value => 'Closed',
        ];

        return $statusSelectionItems;
    }
}