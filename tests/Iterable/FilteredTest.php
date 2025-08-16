<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Iterable;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Iterable\Filtered;
use Skeleton\Iterable\ListOf;
use Skeleton\Tests\Func\AlwaysFalse;
use Skeleton\Tests\Func\AlwaysTrue;
use Skeleton\Tests\Func\Even;

final class FilteredTest extends TestCase
{
    #[Test]
    public function filtersAndKeepsOrder(): void
    {
        $filtered = new Filtered([5, 1, 4, 2, 3], new Even());
        $this->assertSame(
            [4, 2],
            new ListOf($filtered)->array(),
            'filters evens and keeps order'
        );
    }

    #[Test]
    public function returnsEmptyOnNoMatches(): void
    {
        $filtered = new Filtered([1, 3, 5], new AlwaysFalse());
        $this->assertSame(
            [],
            new ListOf($filtered)->array(),
            'no matches returns empty'
        );
    }

    #[Test]
    public function passesAllWhenPredicateAlwaysTrue(): void
    {
        $source = ['a', 'bb', 'ccc'];
        $filtered = new Filtered($source, new AlwaysTrue());
        $this->assertSame(
            $source,
            new ListOf($filtered)->array(),
            'all pass'
        );
    }
}
