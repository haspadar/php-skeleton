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
use Skeleton\Iterable\Mapped;
use Skeleton\Tests\Func\AppendSuffix;
use Skeleton\Tests\Func\Square;

final class MappedTest extends TestCase
{
    #[Test]
    public function mapsNumbersWithSquare(): void
    {
        $this->assertSame(
            [1, 4, 9, 16],
            new ListOf(
                new Mapped(
                    [1, 2, 3, 4],
                    new Square()
                )
            )->array(),
            'squares numbers'
        );
    }

    #[Test]
    public function mapsStringsByAppendingSuffix(): void
    {
        $this->assertSame(
            ['ax', 'bx', 'cx'],
            new ListOf(
                new Mapped(
                    ['a', 'b', 'c'],
                    new AppendSuffix('x')
                )
            )->array(),
            'appends suffix'
        );
    }

    #[Test]
    public function emptyIterable(): void
    {
        $this->assertSame(
            [],
            new ListOf(new Mapped([], new Square()))->array(),
            'empty -> empty'
        );
    }
}
