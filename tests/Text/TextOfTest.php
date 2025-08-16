<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Text;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Text\TextOf;

final class TextOfTest extends TestCase
{
    #[Test]
    public function returnsOriginalText(): void
    {
        $this->assertSame(
            'hello world',
            new TextOf('hello world')->value(),
            'Expected TextOf to return original string as-is'
        );
    }
}
