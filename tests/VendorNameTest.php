<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Text\TextOf;
use Skeleton\VendorName;

final class VendorNameTest extends TestCase
{
    use ThrowAsserts;

    #[Test]
    public function convertsToLowercase(): void
    {
        $this->assertSame(
            'myvendor',
            new VendorName(new TextOf('MyVendor'))->value(),
            'VendorName should convert input to lowercase'
        );
    }

    #[Test]
    public function allowsLowercaseAndDigitsAndDashes(): void
    {
        $this->assertSame(
            'vendor-123',
            new VendorName(new TextOf('Vendor-123'))->value(),
            'VendorName should allow lowercase letters, digits, and dashes'
        );
    }

    #[Test]
    public function throwsWhenStartsWithDigit(): void
    {
        $this->assertThrows(
            fn () => new VendorName(new TextOf('1vendor'))->value(),
            InvalidArgumentException::class,
            'VendorName should not start with a digit'
        );
    }

    #[Test]
    public function throwsWhenContainsInvalidCharacter(): void
    {
        $this->assertThrows(
            fn () => new VendorName(new TextOf('vendor_name'))->value(),
            InvalidArgumentException::class,
            'VendorName should not allow underscores'
        );
    }

    #[Test]
    public function throwsWhenEmpty(): void
    {
        $this->assertThrows(
            fn () => new VendorName(new TextOf(''))->value(),
            InvalidArgumentException::class,
            'VendorName should not allow empty string'
        );
    }
}
