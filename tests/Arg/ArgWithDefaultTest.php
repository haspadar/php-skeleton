<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Arg;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Arg\ArgMissing;
use Skeleton\Arg\ArgProvided;
use Skeleton\Arg\ArgWithDefault;

final class ArgWithDefaultTest extends TestCase
{
    #[Test]
    public function returnsOriginName(): void
    {
        $this->assertSame(
            'vendor',
            new ArgWithDefault(new ArgMissing('vendor'), 'haspadar')->name(),
            'Should return original argument name'
        );
    }

    #[Test]
    public function returnsOriginDescription(): void
    {
        $this->assertSame(
            'Vendor name',
            new ArgWithDefault(new ArgMissing('vendor', 'Vendor name'), 'haspadar')->description(),
            'Should return original argument description'
        );
    }

    #[Test]
    public function usesDefaultIfMissing(): void
    {
        $this->assertSame(
            'haspadar',
            new ArgWithDefault(new ArgMissing('vendor'), 'haspadar')->value(),
            'Should return default value if argument is missing'
        );
    }

    #[Test]
    public function usesProvidedValue(): void
    {
        $this->assertSame(
            'custom',
            new ArgWithDefault(new ArgProvided('vendor', 'custom'), 'haspadar')->value(),
            'Should return provided value if available'
        );
    }

    #[Test]
    public function alwaysHasValue(): void
    {
        $this->assertTrue(
            new ArgWithDefault(new ArgMissing('vendor'), 'any')->hasValue(),
            'ArgWithDefault must always report hasValue as true'
        );
    }
}
