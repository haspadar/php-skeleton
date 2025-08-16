<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Replacement;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Replacement\RepoReplacement;
use Skeleton\Text\TextOf;

final class RepoReplacementTest extends TestCase
{
    #[Test]
    public function replacesSingleOccurrence(): void
    {
        $this->assertSame(
            'Repository: mono',
            new RepoReplacement(
                new TextOf('mono')
            )->applyTo('Repository: __REPO__'),
            'single placeholder replaced'
        );
    }

    #[Test]
    public function leavesTextUntouchedWhenNoPlaceholder(): void
    {
        $this->assertSame(
            'Repository: foo',
            new RepoReplacement(
                new TextOf('mono')
            )->applyTo('Repository: foo'),
            'no placeholder -> unchanged'
        );
    }

    #[Test]
    public function replacesMultipleOccurrencesOnOneLine(): void
    {
        $this->assertSame(
            'mono / mono-tests',
            new RepoReplacement(
                new TextOf('mono')
            )->applyTo('__REPO__ / __REPO__-tests'),
            'multiple placeholders on one line'
        );
    }

    #[Test]
    public function replacesInMultilineText(): void
    {
        $this->assertSame(
            "repo mono\npkg mono",
            new RepoReplacement(
                new TextOf('mono')
            )->applyTo("repo __REPO__\npkg __REPO__"),
            'multiline replacement'
        );
    }
}
