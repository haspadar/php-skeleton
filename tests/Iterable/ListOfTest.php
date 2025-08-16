<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Iterable;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Iterable\ListOf;

final class ListOfTest extends TestCase
{
    #[Test]
    public function convertsArrayAndResetsKeys(): void
    {
        $this->assertSame(
            ['a', 'b', 'c'],
            new ListOf([10 => 'a', 20 => 'b', 30 => 'c'])->array(),
            'array keys are reset to 0..n-1'
        );
    }

    #[Test]
    public function preservesOrderForArray(): void
    {
        $this->assertSame(
            [5, 1, 4, 2, 3],
            new ListOf([5, 1, 4, 2, 3])->array(),
            'order preserved for arrays'
        );
    }

    #[Test]
    public function emptyIterableProducesEmptyList(): void
    {
        $this->assertSame(
            [],
            new ListOf([])->array(),
            'empty iterable yields empty list'
        );
    }
}
