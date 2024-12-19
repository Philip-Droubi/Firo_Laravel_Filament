<?php

namespace App\Enums;

enum ReportableTypes: string
{
    case PROFILE = 'App\Models\User';
    case USER_SERVICE = 'App\Models\Users\Service\UserService';
    case CUSTOMER_SERVICE_CARD = 'App\Models\System\CustomerService\CustomerCard';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getStatusSelectionItems(): array
    {
        $statusSelectionItems = [
            self::PROFILE->value => __('reports.' . self::PROFILE->value),
            self::USER_SERVICE->value => __('reports.' . self::USER_SERVICE->value),
            self::CUSTOMER_SERVICE_CARD->value => __('reports.' . self::CUSTOMER_SERVICE_CARD->value),
        ];

        return $statusSelectionItems;
    }
}