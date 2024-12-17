<?php

namespace App\Enum;

use ReflectionClass;

enum AdZoneLocation: string
{
    case HEADER = 'header';
    case FOOTER = 'footer';
    case SIDEBAR = 'sidebar';

    public static function getValues(): array
    {
        return array_column((new ReflectionClass(static::class))->getConstants(), 'value');
    }
}