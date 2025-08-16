<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Each;

final class EachTest extends TestCase
{
    #[Test]
    public function callsActionForEachItem(): void
    {
        $called = [];

        new Each(
            ['a', 'b', 'c'],
            function ($item) use (&$called) {
                $called[] = strtoupper($item);
            }
        )->perform();

        $this->assertSame(
            ['A', 'B', 'C'],
            $called,
            'Each should call the action for every item'
        );
    }
}
