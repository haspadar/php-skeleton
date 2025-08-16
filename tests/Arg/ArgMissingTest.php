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
use Skeleton\Exception;
use Skeleton\Tests\ThrowAsserts;

final class ArgMissingTest extends TestCase
{
    use ThrowAsserts;

    #[Test]
    public function throwsWhenValueAccessed(): void
    {
        $this->assertThrows(
            fn () => new ArgMissing('vendor')->value(),
            Exception::class,
            'Expected exception when accessing value of missing argument'
        );
    }

    #[Test]
    public function hasNoValue(): void
    {
        $this->assertFalse(
            new ArgMissing('vendor')->hasValue(),
            'Missing arg must not have value'
        );
    }

    #[Test]
    public function returnsName(): void
    {
        $this->assertSame(
            'vendor',
            new ArgMissing('vendor')->name(),
            'Must return the original argument name'
        );
    }

    #[Test]
    public function returnsEmptyDescriptionByDefault(): void
    {
        $this->assertSame(
            '',
            new ArgMissing('vendor')->description(),
            'Default description must be empty'
        );
    }

    #[Test]
    public function returnsProvidedDescription(): void
    {
        $this->assertSame(
            'Vendor name',
            new ArgMissing('vendor', 'Vendor name')->description(),
            'Must return provided description'
        );
    }
}
