<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Replacement;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Replacement\DescriptionReplacement;
use Skeleton\Text\TextOf;

final class DescriptionReplacementTest extends TestCase
{
    #[Test]
    public function replacesSingleOccurrence(): void
    {
        $this->assertSame(
            'desc: Library',
            new DescriptionReplacement(
                new TextOf('Library')
            )->applyTo('desc: __DESCRIPTION__'),
            'single placeholder replaced'
        );
    }

    #[Test]
    public function leavesTextUntouchedWhenNoPlaceholder(): void
    {
        $this->assertSame(
            'desc: none',
            new DescriptionReplacement(
                new TextOf('Library')
            )->applyTo('desc: none'),
            'no placeholder -> unchanged'
        );
    }

    #[Test]
    public function replacesMultipleOccurrencesOnOneLine(): void
    {
        $this->assertSame(
            'Library | Library',
            new DescriptionReplacement(
                new TextOf('Library')
            )->applyTo('__DESCRIPTION__ | __DESCRIPTION__'),
            'multiple placeholders on one line'
        );
    }

    #[Test]
    public function replacesInMultilineText(): void
    {
        $this->assertSame(
            "About: Library\nDesc: Library",
            new DescriptionReplacement(
                new TextOf('Library')
            )->applyTo("About: __DESCRIPTION__\nDesc: __DESCRIPTION__"),
            'multiline replacement'
        );
    }
}
