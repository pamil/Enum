<?php

declare(strict_types=1);

namespace Tests\Pamil\Enum;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

final class EnumTest extends TestCase
{
    /** @test */
    public function it_can_be_compared_by_identity_when_created_by_a_static_constructor(): void
    {
        Assert::assertSame(EnumFixture::active(), EnumFixture::active());
        Assert::assertSame(EnumFixture::inactive(), EnumFixture::inactive());
        Assert::assertNotSame(EnumFixture::active(), EnumFixture::inactive());
    }

    /** @test */
    public function it_cannot_be_compared_by_identity_when_created_by_a_regualar_constructor(): void
    {
        Assert::assertNotSame(new EnumFixture(EnumFixture::active), EnumFixture::active());
        Assert::assertNotSame(new EnumFixture(EnumFixture::inactive), EnumFixture::inactive());
    }

    /** @test */
    public function it_cannot_be_compared_by_identity_when_unserialized(): void
    {
        Assert::assertNotSame(unserialize(serialize(EnumFixture::active())), EnumFixture::active());
        Assert::assertNotSame(unserialize(serialize(EnumFixture::inactive())), EnumFixture::inactive());
    }
}
