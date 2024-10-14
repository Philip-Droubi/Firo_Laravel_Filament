<?php

namespace App\Enums;

enum ContactTypes: string
{
    case EMAIL = 'email';
    case PHONE_NUMBER = 'phone-number';
    case LINK = 'link';
    case FACEBOOK_LINK = 'facebook';
    case INSTAGRAM_LINK = 'instagram';
    case X_LINK = 'x';
    case LINKEDIN_LINK = 'linkedIn';
    case TELEGRAM_LINK = 'telegram';
    case WHATSAPP_LINK = 'whatsApp';
    case YOUTUBE_LINK = 'youtube';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getStatusSelectionItems(): array
    {
        $statusSelectionItems = [
            self::EMAIL->value => 'Email',
            self::PHONE_NUMBER->value => 'Phone number',
            self::LINK->value => 'Link',
            self::FACEBOOK_LINK->value => 'Facebook',
            self::INSTAGRAM_LINK->value => 'Instagram',
            self::X_LINK->value => 'X',
            self::LINKEDIN_LINK->value => 'LinkedIn',
            self::TELEGRAM_LINK->value => 'Telegram',
            self::WHATSAPP_LINK->value => 'WhatsApp',
            self::YOUTUBE_LINK->value => 'Youtube',
        ];

        return $statusSelectionItems;
    }
}