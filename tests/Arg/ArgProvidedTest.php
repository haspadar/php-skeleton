<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Arg;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Arg\ArgProvided;

final class ArgProvidedTest extends TestCase
{
    #[Test]
    public function returnsName(): void
    {
        $this->assertSame(
            'vendor',
            new ArgProvided('vendor', 'haspadar')->name(),
            'Should return argument name'
        );
    }

    #[Test]
    public function returnsValue(): void
    {
        $this->assertSame(
            'haspadar',
            new ArgProvided('vendor', 'haspadar')->value(),
            'Should return argument value'
        );
    }

    #[Test]
    public function hasValueIsTrue(): void
    {
        $this->assertTrue(
            new ArgProvided('vendor', 'haspadar')->hasValue(),
            'Provided arg must have value'
        );
    }

    #[Test]
    public function returnsDescription(): void
    {
        $this->assertSame(
            'Vendor name',
            new ArgProvided('vendor', 'haspadar', 'Vendor name')->description(),
            'Should return provided description'
        );
    }

    #[Test]
    public function returnsEmptyDescriptionByDefault(): void
    {
        $this->assertSame(
            '',
            new ArgProvided('vendor', 'haspadar')->description(),
            'Default description should be empty'
        );
    }
}
