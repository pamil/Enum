<?php

declare(strict_types=1);

namespace Pamil\Enum;

abstract class Enum extends \MyCLabs\Enum\Enum
{
    /** @var array<string, static> */
    protected static $flyweightCache = [];

    public static function __callStatic($name, $arguments)
    {
        if (!isset(static::$flyweightCache[static::class][$name])) {
            static::$flyweightCache[static::class][$name] = parent::__callStatic($name, $arguments);
        }

        return static::$flyweightCache[static::class][$name];
    }
}
