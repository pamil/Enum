<?php

declare(strict_types=1);

namespace Tests\Pamil\Enum;

use Pamil\Enum\Enum;

/**
 * @method static static active()
 * @method static static inactive()
 */
final class EnumFixture extends Enum
{
    public const active = 1;
    public const inactive = 2;
}
