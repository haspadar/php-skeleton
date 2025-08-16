<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Description;
use Skeleton\Text\TextOf;

final class DescriptionTest extends TestCase
{
    #[Test]
    public function trimsAndTruncatesLongText(): void
    {
        $this->assertSame(
            'abcabcabca',
            new Description(
                new TextOf('   ' . str_repeat('abc', 100) . '   '),
                10
            )->value(),
            'Expected text to be trimmed and truncated to 10 chars'
        );
    }

    #[Test]
    public function returnsWholeTextIfShortEnough(): void
    {
        $this->assertSame(
            'short',
            new Description(
                new TextOf('short'),
                10
            )->value(),
            'Expected full string if shorter than limit'
        );
    }

    #[Test]
    public function usesDefaultLengthWhenNotProvided(): void
    {
        $original = str_repeat('x', 200);
        $this->assertSame(
            str_repeat('x', 140),
            new Description(new TextOf($original))->value(),
            'Expected default max length to be 140 chars'
        );
    }

    #[Test]
    public function supportsUnicodeCharacters(): void
    {
        $this->assertSame(
            '😀😃😄😁😆',
            new Description(
                new TextOf('😀😃😄😁😆😅😂🤣😊😇'),
                5
            )->value(),
            'Expected proper Unicode handling in mb_substr'
        );
    }
}
