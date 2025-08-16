<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Replacement;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Replacement\VendorReplacement;
use Skeleton\Text\TextOf;

final class VendorReplacementTest extends TestCase
{
    #[Test]
    public function replacesSingleOccurrence(): void
    {
        $this->assertSame(
            'vendor: Haspadar',
            new VendorReplacement(
                new TextOf('Haspadar')
            )->applyTo('vendor: __VENDOR__'),
            'single placeholder replaced'
        );
    }

    #[Test]
    public function leavesTextUntouchedWhenNoPlaceholder(): void
    {
        $this->assertSame(
            'vendor: foo',
            new VendorReplacement(
                new TextOf('Haspadar')
            )->applyTo('vendor: foo'),
            'no placeholder -> unchanged'
        );
    }

    #[Test]
    public function replacesMultipleOccurrencesOnOneLine(): void
    {
        $this->assertSame(
            'Haspadar / Haspadar-lib',
            new VendorReplacement(
                new TextOf('Haspadar')
            )->applyTo('__VENDOR__ / __VENDOR__-lib'),
            'multiple placeholders on one line'
        );
    }

    #[Test]
    public function replacesInMultilineText(): void
    {
        $this->assertSame(
            "vendor Haspadar\norg Haspadar",
            new VendorReplacement(
                new TextOf('Haspadar')
            )->applyTo("vendor __VENDOR__\norg __VENDOR__"),
            'multiline replacement'
        );
    }
}
