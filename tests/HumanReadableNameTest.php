<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Exception;
use Skeleton\HumanReadableName;
use Skeleton\Text\TextOf;

final class HumanReadableNameTest extends TestCase
{
    #[Test]
    public function returnsTrimmedWhenInputHasSpaces(): void
    {
        $this->assertSame(
            'Project Name',
            new HumanReadableName(
                new TextOf('  Project Name  ')
            )->value(),
            'returns trimmed non-empty name'
        );
    }

    #[Test]
    public function throwsWhenInputIsEmptyAfterTrim(): void
    {
        $this->expectException(Exception::class);
        new HumanReadableName(
            new TextOf('   ')
        )->value();
    }
}
