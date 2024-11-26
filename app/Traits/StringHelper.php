<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Pluralizer;

trait StringHelper
{
    public function getModelNameFromTableName($name): string
    {
        return Str::studly(Str::singular($name));
    }

    public static function getPluralVarName($name): string
    {
        return strtolower(Str::plural($name));
    }

    public static function getSingularVarName($name): string
    {
        return strtolower(Pluralizer::singular($name));
    }

    public function arToEnNum(String $string): String
    {
        return strtr($string, array(
            '۰' => '0',
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9',
            '٠' => '0',
            '١' => '1',
            '٢' => '2',
            '٣' => '3',
            '٤' => '4',
            '٥' => '5',
            '٦' => '6',
            '٧' => '7',
            '٨' => '8',
            '٩' => '9'
        ));
    }

    public function getShorterString(string $text, int $length = 203, bool $addDots = true): string
    {
        if (mb_strlen($text) > $length) {
            $text = mb_substr($text, 0, $length - 3);
            if ($addDots)
                $text = $text . "...";
        }
        return $text;
    }

    public function subStringBetweenTwoChars($string, $firstChar, $lastChar): string|bool
    {
        $firstPos = mb_stripos($string, $firstChar);
        $lastPos = mb_stripos($string, $lastChar);
        $length = $lastPos - $firstPos;
        if ($lastPos = 0 || $length < 0)
            return false;
        $subString = mb_substr($string, mb_stripos($string, $firstChar) + 1, $length - 1);
        return $subString;
    }
}
