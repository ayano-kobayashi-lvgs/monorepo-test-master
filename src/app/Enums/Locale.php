<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * Locale Enum
 */
class Locale extends Enum
{
    const JAPAN = 'ja';
    const US = 'en';

    /**
     * ロケールの全件取得
     */
    public static function getLocaleValues(): array
    {
        return self::toArray();
    }
}
