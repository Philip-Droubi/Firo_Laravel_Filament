<?php

namespace App\Enums;

enum UserPointsCases: string
{
    case PROFILE_IMAGE = "add image case";
    case BG_IMAGE = "add bg case";
    case VERIFY_EMAIL = "verify email case";
    case FOUR_STARS_PLUS = "getting more than 4 stars";
    case THREE_STARS_PLUS = "getting more than 3 stars";
    case TWO_STARS_PLUS = "getting more than 2 stars";
    case TWO_STARS_LESS = "getting less than 2 stars";
    case AUTO_BAN = "auto ban case";
    case BAN = "ban case";

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
