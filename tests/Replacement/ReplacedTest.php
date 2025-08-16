<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Replacement;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Replacement\Replaced;
use Skeleton\Text\TextOf;

final class ReplacedTest extends TestCase
{
    #[Test]
    public function replacesPlaceholderWithValue(): void
    {
        $this->assertSame(
            'Hello Haspadar',
            new Replaced('__NAME__', new TextOf('Haspadar'))
                ->applyTo('Hello __NAME__'),
            'Should replace __NAME__ with Haspadar'
        );
    }

    #[Test]
    public function doesNothingIfPlaceholderNotFound(): void
    {
        $this->assertSame(
            'No match here',
            new Replaced('__MISSING__', new TextOf('Something'))
                ->applyTo('No match here'),
            'Should leave text unchanged if placeholder not found'
        );
    }

    #[Test]
    public function placeholderReturnsGivenValue(): void
    {
        $this->assertSame(
            '__SOMETHING__',
            new Replaced('__SOMETHING__', new TextOf('value'))->placeholder(),
            'Should return the placeholder'
        );
    }
}
