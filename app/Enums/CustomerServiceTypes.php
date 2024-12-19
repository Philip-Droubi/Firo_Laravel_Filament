<?php

namespace App\Enums;

enum CustomerServiceTypes: string
{
    case INQUIRY = 'inquiry';
    case BUG = 'bug';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function transValues(): array
    {
        $types = self::cases();
        foreach ($types as $type) {
            $data[] = __("keys." . $type->value);
        }
        return $data;
    }

    public static function getStatusSelectionItems(): array
    {
        $statusSelectionItems = [
            self::INQUIRY->value => 'Inquiry',
            self::BUG->value => 'Bug',
        ];

        return $statusSelectionItems;
    }
}
